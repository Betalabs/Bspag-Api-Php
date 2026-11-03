<?php
/*
 * BspagApiLib
 *
 * Pix Automatico (escrito a mao, no padrao dos controllers gerados pelo APIMATIC).
 */

namespace BspagApiLib\Controllers;

use BspagApiLib\APIException;
use BspagApiLib\APIHelper;
use BspagApiLib\Configuration;
use BspagApiLib\Http\HttpContext;
use BspagApiLib\Http\HttpMethod;
use BspagApiLib\Http\HttpRequest;
use BspagApiLib\Http\HttpResponse;
use Unirest\Request;

/**
 * Autorizacoes e cobrancas do Pix Automatico (`/api/v1/pix-automatic/*` do Bspag). Valores em centavos.
 *
 * Diferente dos controllers gerados, recebe e devolve **arrays** associativos: o contrato do Pix
 * Automatico e novo e a Engine so le campos, entao nao ha modelos tipados a manter em sincronia.
 * Erros usam a mesma excecao dos demais: 400 (recusa da Safe2Pay), 404 (nao encontrado), 422 (payload
 * invalido) viram `Exceptions\ErrorException`, com o corpo em `getResponseBody()`.
 */
class PixAutomaticController extends BaseController
{
    /**
     * @var PixAutomaticController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return PixAutomaticController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Cria a autorizacao (com pagamento imediato opcional do 1o ciclo).
     *
     * @param array       $body            contract, customer, calendar, allows_retries, amount, immediate_payment, metadata
     * @param string|null $idempotencyKey  (optional) evita criar duas autorizacoes se a chamada for repetida
     * @return array id, status, qr_code_url, copy_and_paste, expires_at, immediate_payment
     * @throws APIException Thrown if API call fails
     */
    public function createAuthorization(array $body, $idempotencyKey = null)
    {
        return $this->send(HttpMethod::POST, '/pix-automatic/authorizations', $body, $idempotencyKey);
    }

    /**
     * Consulta o estado atual da autorizacao (o Bspag pergunta a Safe2Pay e grava a mudanca).
     *
     * @param string $authorizationId id da autorizacao (o `id` devolvido na criacao)
     * @return array
     * @throws APIException Thrown if API call fails
     */
    public function getAuthorization($authorizationId)
    {
        return $this->send(HttpMethod::GET, '/pix-automatic/authorizations/' . rawurlencode($authorizationId));
    }

    /**
     * Cancela a autorizacao (e os agendamentos dela). Idempotente.
     *
     * @param string $authorizationId
     * @return array
     * @throws APIException Thrown if API call fails
     */
    public function cancelAuthorization($authorizationId)
    {
        return $this->send(HttpMethod::DELETE, '/pix-automatic/authorizations/' . rawurlencode($authorizationId));
    }

    /**
     * Agenda o debito de um ciclo contra uma autorizacao aprovada (D-10 a D-2 da data do debito).
     *
     * @param string      $authorizationId
     * @param array       $body            due_date (Y-m-d), amount, description, reference, useful_day_adjustment
     * @param string|null $idempotencyKey  (optional)
     * @return array code (IdTransaction), status, amount, due_date, authorization_id, schedule_id
     * @throws APIException Thrown if API call fails
     */
    public function createCharge($authorizationId, array $body, $idempotencyKey = null)
    {
        return $this->send(
            HttpMethod::POST,
            '/pix-automatic/authorizations/' . rawurlencode($authorizationId) . '/charges',
            $body,
            $idempotencyKey
        );
    }

    /**
     * Retentativa do debito que expirou por falta de saldo, em nova data, no mesmo agendamento.
     *
     * @param string $code o `code` devolvido ao agendar
     * @param array  $body date (Y-m-d)
     * @return array
     * @throws APIException Thrown if API call fails
     */
    public function retryCharge($code, array $body)
    {
        return $this->send(HttpMethod::POST, '/pix-automatic/charges/' . rawurlencode($code) . '/retry', $body);
    }

    /**
     * Cancela o debito antes de acontecer. Idempotente.
     *
     * @param string $code
     * @return array
     * @throws APIException Thrown if API call fails
     */
    public function cancelCharge($code)
    {
        return $this->send(HttpMethod::DELETE, '/pix-automatic/charges/' . rawurlencode($code));
    }

    /**
     * @param string     $method HttpMethod::*
     * @param string     $path
     * @param array|null $body
     * @param string|null $idempotencyKey
     * @return array corpo da resposta, decodificado
     * @throws APIException
     */
    private function send($method, $path, array $body = null, $idempotencyKey = null)
    {
        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::$BASEURI . $path);

        //prepare headers
        $_headers = array(
            'user-agent' => BaseController::USER_AGENT,
            'Accept'     => 'application/json',
        );
        if (null !== $body) {
            $_headers['content-type'] = 'application/json; charset=utf-8';
        }
        if (null !== $idempotencyKey) {
            $_headers['idempotency-key'] = $idempotencyKey;
        }

        //set HTTP basic auth parameters
        Request::auth(Configuration::$basicAuthUserName, Configuration::$basicAuthPassword);

        //call on-before Http callback
        $_httpRequest = new HttpRequest($method, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = $this->dispatch($method, $_queryUrl, $_headers, $body);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $decoded = json_decode($response->raw_body, true);

        return is_array($decoded) ? $decoded : array();
    }

    private function dispatch($method, $url, array $headers, array $body = null)
    {
        $_bodyJson = null !== $body ? Request\Body::Json($body) : null;

        switch ($method) {
            case HttpMethod::POST:
                return Request::post($url, $headers, $_bodyJson);
            case HttpMethod::DELETE:
                return Request::delete($url, $headers);
            default:
                return Request::get($url, $headers);
        }
    }
}
