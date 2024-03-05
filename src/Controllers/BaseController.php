<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Controllers;

use BetaPayApiLib\Http\HttpCallBack;
use BetaPayApiLib\Http\HttpContext;
use BetaPayApiLib\Http\HttpResponse;
use BetaPayApiLib\APIException;
use BetaPayApiLib\Exceptions;
use \apimatic\jsonmapper\JsonMapper;
use Unirest\Request;

/**
* Base controller
*/
class BaseController
{
    /**
     * User-agent to be sent with API calls
     * @var string
     */
    const USER_AGENT = 'BetaPayApi - PHP 5.6.0';

    /**
     * HttpCallBack instance associated with this controller
     * @var HttpCallBack
     */
    private $httpCallBack = null;

    /**
     * Set HttpCallBack for this controller
     * @param HttpCallBack $httpCallBack Http Callbacks called before/after each API call
     */
    public function setHttpCallBack(HttpCallBack $httpCallBack)
    {
        $this->httpCallBack = $httpCallBack;
    }

    /**
     * Get HttpCallBack for this controller
     * @return HttpCallBack The HttpCallBack object set for this controller
     */
    public function getHttpCallBack()
    {
        return $this->httpCallBack;
    }

    /**
     * Get a new JsonMapper instance for mapping objects
     * @return \apimatic\jsonmapper\JsonMapper JsonMapper instance
     */
    protected function getJsonMapper()
    {
        $mapper = new JsonMapper();
        $mapper->arChildClasses['BetaPayApiLib\\Models\\GetTransactionResponse'] = array(
            'BetaPayApiLib\\Models\\GetBankTransferTransactionResponse',
            'BetaPayApiLib\\Models\\GetSafetyPayTransactionResponse',
            'BetaPayApiLib\\Models\\GetVoucherTransactionResponse',
            'BetaPayApiLib\\Models\\GetBoletoTransactionResponse',
            'BetaPayApiLib\\Models\\GetDebitCardTransactionResponse',
            'BetaPayApiLib\\Models\\GetPrivateLabelTransactionResponse',
            'BetaPayApiLib\\Models\\GetCashTransactionResponse',
            'BetaPayApiLib\\Models\\GetCreditCardTransactionResponse',
            'BetaPayApiLib\\Models\\GetPixTransactionResponse'
        );
        return $mapper;
    }

    protected function validateResponse(HttpResponse $response, HttpContext $_httpContext)
    {
        if ($response->getStatusCode() == 400) {
            throw new Exceptions\ErrorException('Invalid request', $_httpContext);
        }
        if ($response->getStatusCode() == 401) {
            throw new Exceptions\ErrorException('Invalid API key', $_httpContext);
        }
        if ($response->getStatusCode() == 404) {
            throw new Exceptions\ErrorException('An informed resource was not found', $_httpContext);
        }
        if ($response->getStatusCode() == 412) {
            throw new Exceptions\ErrorException('Business validation error', $_httpContext);
        }
        if ($response->getStatusCode() == 422) {
            throw new Exceptions\ErrorException('Contract validation error', $_httpContext);
        }
        if ($response->getStatusCode() == 500) {
            throw new Exceptions\ErrorException('Internal server error', $_httpContext);
        }
        if (($response->getStatusCode() < 200) || ($response->getStatusCode() > 208)) { //[200,208] = HTTP OK
            throw new APIException('HTTP Response Not OK', $_httpContext);
        }
    }
}
