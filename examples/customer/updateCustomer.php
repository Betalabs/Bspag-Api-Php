<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$customerController = $apiClient->getCustomers();

$request = new \BspagApiLib\Models\UpdateCustomerRequest();
$request->name = "Benjamin Sisko";
$request->email = "sisko@starfleet.com";

$customerId = "cus_ExAmPlExxxxxxxxx";

$result = $customerController->updateCustomer($customerId, $request);

echo json_encode($result, JSON_PRETTY_PRINT);
