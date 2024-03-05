<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BetaPayApiLib\BetaPayApiClient($basicAuthUserName, $basicAuthPassword);

$chargesController = $apiClient->getCharges();

$chargeId = "ch_ExAmPlExxxxxxxxx";
$request = new \BetaPayApiLib\Models\CreateCancelChargeRequest();

$result = $chargesController->cancelCharge($chargeId, $request);

echo json_encode($result, JSON_PRETTY_PRINT);
