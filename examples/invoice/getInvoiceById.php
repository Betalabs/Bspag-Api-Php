<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$invoicesController = $apiClient->getInvoices();

$invoiceId = "in_ExAmPlExxxxxxxxx";

$result = $invoicesController->getInvoice($invoiceId);

echo json_encode($result, JSON_PRETTY_PRINT);
