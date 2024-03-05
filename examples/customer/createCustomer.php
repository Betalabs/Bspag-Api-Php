<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BetaPayApiLib\BetaPayApiClient($basicAuthUserName, $basicAuthPassword);

$customerController = $apiClient->getCustomers();

$request = new \BetaPayApiLib\Models\CreateCustomerRequest();
$request->name = "James T. Kirk";
$request->email = "jim.kirk@starfleet.com";
$request->type = "individual";
$request->document = "71327780054";
$request->code = "MY_CUSTOMER_001";

$request->address = new \BetaPayApiLib\Models\CreateAddressRequest();
$request->address->line1 = "Avenida Paulista, Nº xxxx";
$request->address->line2 = "8º andar";
$request->address->zipCode = "01311000";
$request->address->city = "São Paulo";
$request->address->state = "SP";
$request->address->country = "BR";
$request->address->metadata = new \BetaPayApiLib\Models\UpdateMetadataRequest();
$request->address->metadata->id = "my_address_id";

$request->phones = new \BetaPayApiLib\Models\CreatePhonesRequest();
$request->phones->homePhone = new \BetaPayApiLib\Models\CreatePhoneRequest();
$request->phones->homePhone->areaCode = "21";
$request->phones->homePhone->countryCode = "55";
$request->phones->homePhone->number = "987654321";
$request->phones->mobilePhone = new \BetaPayApiLib\Models\CreatePhoneRequest();
$request->phones->mobilePhone->areaCode = "11";
$request->phones->mobilePhone->countryCode = "55";
$request->phones->mobilePhone->number = "987654321";

$result = $customerController->createCustomer($request);

echo json_encode($result, JSON_PRETTY_PRINT);
