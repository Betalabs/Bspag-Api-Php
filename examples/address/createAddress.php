<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$customerController = $apiClient->getCustomers();

$customerId = "cus_ExAmPlExxxxxxxxx";

$request = new \BspagApiLib\Models\CreateAddressRequest();

$request = new \BspagApiLib\Models\CreateAddressRequest();
$request->line1 = "10880, Malibu Point, Malibu Central";
$request->line2 = "7º floor";
$request->zipCode = "90265";
$request->city = "Malibu";
$request->state = "CA";
$request->country = "US";
$request->metadata = new \BspagApiLib\Models\UpdateMetadataRequest();
$request->metadata->id = "my_address_id";

$result = $customerController->createAddress($customerId, $request);

echo json_encode($result, JSON_PRETTY_PRINT);
