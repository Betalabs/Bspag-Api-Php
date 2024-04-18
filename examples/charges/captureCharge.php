<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$chargesController = $apiClient->getCharges();

$chargeId = "ch_ExAmPlExxxxxxxxx";
$request = new \BspagApiLib\Models\CreateCaptureChargeRequest();
$request->code = "new_code";

$result = $chargesController->captureCharge($chargeId, $request);

echo json_encode($result, JSON_PRETTY_PRINT);
