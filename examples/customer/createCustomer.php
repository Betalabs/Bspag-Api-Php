<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$customerController = $apiClient->getCustomers();

$request = new \BspagApiLib\Models\CreateCustomerRequest();
$request->name = "James T. Kirk";
$request->email = "jim.kirk@starfleet.com";
$request->type = "individual";
$request->document = "71327780054";
$request->code = "MY_CUSTOMER_001";

$request->address = new \BspagApiLib\Models\CreateAddressRequest();
$request->address->line1 = "Avenida Paulista, Nº xxxx";
$request->address->line2 = "8º andar";
$request->address->zipCode = "01311000";
$request->address->city = "São Paulo";
$request->address->state = "SP";
$request->address->country = "BR";
$request->address->metadata = new \BspagApiLib\Models\UpdateMetadataRequest();
$request->address->metadata->id = "my_address_id";

$request->phones = new \BspagApiLib\Models\CreatePhonesRequest();
$request->phones->homePhone = new \BspagApiLib\Models\CreatePhoneRequest();
$request->phones->homePhone->areaCode = "21";
$request->phones->homePhone->countryCode = "55";
$request->phones->homePhone->number = "987654321";
$request->phones->mobilePhone = new \BspagApiLib\Models\CreatePhoneRequest();
$request->phones->mobilePhone->areaCode = "11";
$request->phones->mobilePhone->countryCode = "55";
$request->phones->mobilePhone->number = "987654321";

$result = $customerController->createCustomer($request);

echo json_encode($result, JSON_PRETTY_PRINT);
