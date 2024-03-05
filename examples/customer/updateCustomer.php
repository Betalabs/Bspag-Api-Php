<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BetaPayApiLib\BetaPayApiClient($basicAuthUserName, $basicAuthPassword);

$customerController = $apiClient->getCustomers();

$request = new \BetaPayApiLib\Models\UpdateCustomerRequest();
$request->name = "Benjamin Sisko";
$request->email = "sisko@starfleet.com";

$customerId = "cus_ExAmPlExxxxxxxxx";

$result = $customerController->updateCustomer($customerId, $request);

echo json_encode($result, JSON_PRETTY_PRINT);
