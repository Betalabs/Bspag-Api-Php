<?php
/**
 * Roteador do servidor embutido do smoke test (tests/smoke_pix_automatic.php): registra cada requisicao
 * recebida e devolve respostas fixas no formato do Bspag.
 */

$headers = array();
foreach ($_SERVER as $key => $value) {
    if (strpos($key, 'HTTP_') === 0) {
        $headers[strtolower(str_replace('_', '-', substr($key, 5)))] = $value;
    }
}
if (isset($_SERVER['CONTENT_TYPE'])) {
    $headers['content-type'] = $_SERVER['CONTENT_TYPE'];
}

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$body = file_get_contents('php://input');

file_put_contents(
    getenv('SMOKE_LOG'),
    json_encode(array('method' => $method, 'path' => $path, 'headers' => $headers, 'body' => $body)) . "\n",
    FILE_APPEND
);

function answer($status, array $data)
{
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

if ($method === 'POST' && $path === '/api/v1/pix-automatic/authorizations') {
    if (strpos($body, 'FAIL') !== false) {
        answer(400, array('error' => 'Pain.013 recebida fora do prazo (HTTP 412)'));
    }
    answer(201, array('id' => 'AUTH-1', 'status' => 'pending', 'immediate_payment' => array('code' => '987654')));
}
if ($path === '/api/v1/pix-automatic/authorizations/AUTH-1' && $method === 'GET') {
    answer(200, array('id' => 'AUTH-1', 'status' => 'approved'));
}
if ($path === '/api/v1/pix-automatic/authorizations/AUTH-1' && $method === 'DELETE') {
    answer(200, array('id' => 'AUTH-1', 'status' => 'canceled'));
}
if ($path === '/api/v1/pix-automatic/authorizations/AUTH-1/charges' && $method === 'POST') {
    answer(201, array('code' => '555001', 'status' => 'waiting_payment'));
}
if ($path === '/api/v1/pix-automatic/charges/555001/retry' && $method === 'POST') {
    answer(200, array('code' => '555001', 'status' => 'waiting_payment'));
}
if ($path === '/api/v1/pix-automatic/charges/555001' && $method === 'DELETE') {
    answer(200, array('code' => '555001', 'status' => 'canceled'));
}

answer(404, array('error' => 'nao encontrado'));
