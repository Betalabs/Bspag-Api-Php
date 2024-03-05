<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BetaPayApiLib\BetaPayApiClient($basicAuthUserName, $basicAuthPassword);

$customerController = $apiClient->getCustomers();

$customer = new \BetaPayApiLib\Models\CreateCustomerRequest();
$customer->name = "sdk customer";
$customer->email = "picard@starfleet.com";

$request = new \BetaPayApiLib\Models\CreateCardRequest();

$request->number = "41111111111111";
$request->holderName = "Jean Luc Picard";
$request->holderDocument = "93095135270";
$request->expMonth = 1;
$request->expYear = 25;
$request->cvv = "351";
// Brand is Optional field and autodetected;
$request->brand = "Visa";
$request->privateLabel = false;
// Billing Address;
$request->billingAddress = new \BetaPayApiLib\Models\CreateAddressRequest();
$request->billingAddress->line1 = "Avenida Paulista, Nº xxxx";
$request->billingAddress->line2 = "7º Andar";
$request->billingAddress->zipCode = "01311000";
$request->billingAddress->city = "São Paulo";
$request->billingAddress->state = "SP";
$request->billingAddress->country = "BR";

$request->options = new \BetaPayApiLib\Models\CreateCardOptionsRequest();
$request->options->verifyCard = true;

$createdCustomer = $customerController->createCustomer($customer);
$result = $customerController->createCard($createdCustomer->id, $request);

echo json_encode($result, JSON_PRETTY_PRINT);
