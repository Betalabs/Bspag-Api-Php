<?php
/**
 * Smoke test do PixAutomaticController: sobe um servidor PHP embutido (tests/smoke_router.php), faz as
 * chamadas reais por HTTP e confere metodo, caminho, cabecalhos, corpo, retorno e mapeamento de erros.
 * O repositorio nao tem PHPUnit (a lib e gerada pelo APIMATIC); este script e a verificacao.
 *
 * Uso: php tests/smoke_pix_automatic.php [caminho/do/vendor/autoload.php]
 * (sem argumento usa ../vendor/autoload.php; as classes da lib vem do autoload e o controller novo e
 * carregado direto de src/, entao testa o que esta na arvore de trabalho)
 */

require $argc > 1 ? $argv[1] : __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Controllers/PixAutomaticController.php';

use BspagApiLib\Configuration;
use BspagApiLib\Controllers\PixAutomaticController;
use BspagApiLib\Exceptions\ErrorException;

$failures = array();
function check($label, $ok)
{
    global $failures;
    echo ($ok ? 'OK   ' : 'FALHA') . ' ' . $label . "\n";
    if (!$ok) {
        $failures[] = $label;
    }
}

$port = 18080 + (getmypid() % 500);
$log = tempnam(sys_get_temp_dir(), 'smoke');
$process = proc_open(
    array(PHP_BINARY, '-S', "127.0.0.1:$port", __DIR__ . '/smoke_router.php'),
    array(array('pipe', 'r'), array('pipe', 'w'), array('pipe', 'w')),
    $pipes,
    null,
    array('SMOKE_LOG' => $log)
);
usleep(700000);

Configuration::$BASEURI = "http://127.0.0.1:$port/api/v1";
Configuration::$basicAuthUserName = 'token-do-tenant';
Configuration::$basicAuthPassword = '';

$client = PixAutomaticController::getInstance();

$requests = function () use ($log) {
    return array_map(function ($line) {
        return json_decode($line, true);
    }, array_filter(explode("\n", (string) file_get_contents($log))));
};

try {
    // criar autorizacao
    $created = $client->createAuthorization(array('contract' => array('name' => 'Clube'), 'amount' => array('value' => 5000)), 'idem-1');
    check('createAuthorization devolve o corpo como array', $created['id'] === 'AUTH-1' && $created['immediate_payment']['code'] === '987654');

    $sent = $requests();
    $first = $sent[0];
    check('POST em /api/v1/pix-automatic/authorizations', $first['method'] === 'POST' && $first['path'] === '/api/v1/pix-automatic/authorizations');
    check('envia Basic auth com o token do tenant', $first['headers']['authorization'] === 'Basic ' . base64_encode('token-do-tenant:'));
    check('envia Idempotency-Key', $first['headers']['idempotency-key'] === 'idem-1');
    check('envia JSON', strpos($first['headers']['content-type'], 'application/json') === 0
        && json_decode($first['body'], true)['amount']['value'] === 5000);

    // consultar, cancelar
    check('getAuthorization', $client->getAuthorization('AUTH-1')['status'] === 'approved');
    check('cancelAuthorization', $client->cancelAuthorization('AUTH-1')['status'] === 'canceled');

    // cobrancas
    $charge = $client->createCharge('AUTH-1', array('due_date' => '2026-12-03', 'amount' => 4990, 'description' => 'x'));
    check('createCharge devolve o code', $charge['code'] === '555001');
    check('retryCharge', $client->retryCharge('555001', array('date' => '2026-12-05'))['status'] === 'waiting_payment');
    check('cancelCharge', $client->cancelCharge('555001')['status'] === 'canceled');

    $all = $requests();
    $paths = array_map(function ($r) {
        return $r['method'] . ' ' . $r['path'];
    }, $all);
    check('caminhos e metodos das 6 chamadas', $paths === array(
        'POST /api/v1/pix-automatic/authorizations',
        'GET /api/v1/pix-automatic/authorizations/AUTH-1',
        'DELETE /api/v1/pix-automatic/authorizations/AUTH-1',
        'POST /api/v1/pix-automatic/authorizations/AUTH-1/charges',
        'POST /api/v1/pix-automatic/charges/555001/retry',
        'DELETE /api/v1/pix-automatic/charges/555001',
    ));
    check(
        'GET e DELETE nao mandam content-type de JSON',
        (!isset($all[1]['headers']['content-type']) || strpos($all[1]['headers']['content-type'], 'json') === false)
        && (!isset($all[2]['headers']['content-type']) || strpos($all[2]['headers']['content-type'], 'json') === false)
    );

    // erros: 400 da Safe2Pay e 404
    try {
        $client->createAuthorization(array('contract' => array('name' => 'FAIL')));
        check('400 vira excecao', false);
    } catch (ErrorException $e) {
        $body = json_decode($e->getResponseBody(), true);
        check('400 vira ErrorException com o corpo do Bspag', $e->getResponseCode() === 400 && $body['error'] === 'Pain.013 recebida fora do prazo (HTTP 412)');
    }
    try {
        $client->getAuthorization('NOPE');
        check('404 vira excecao', false);
    } catch (ErrorException $e) {
        check('404 vira ErrorException', $e->getResponseCode() === 404);
    }
} finally {
    proc_terminate($process);
    @unlink($log);
}

echo "\n" . (count($failures) === 0 ? "Tudo certo.\n" : count($failures) . " falha(s): " . implode('; ', $failures) . "\n");
exit(count($failures) === 0 ? 0 : 1);
