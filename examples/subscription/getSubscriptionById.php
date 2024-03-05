<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BetaPayApiLib\BetaPayApiClient($basicAuthUserName, $basicAuthPassword);

$subscriptionsController = $apiClient->getSubscriptions();

$subscriptionId = "sub_ExAmPlExxxxxxxxx";

$result = $subscriptionsController->getSubscription($subscriptionId);

echo json_encode($result, JSON_PRETTY_PRINT);
