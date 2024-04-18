<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$recipientsController = $apiClient->getRecipients();

$request = new \BspagApiLib\Models\CreateTransferRequest();
$request->amount = 100; // this value should be in cents

$recipientId = "rp_ExAmPlExxxxxxxxx";

$result = $recipientsController->createTransfer($recipientId, $request);

echo json_encode($result, JSON_PRETTY_PRINT);
