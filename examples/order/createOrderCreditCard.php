<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$orderController = $apiClient->getOrders();

$customer = new \BspagApiLib\Models\CreateCustomerRequest();
$customer->name = "sdk customer test";

$creditCard = new \BspagApiLib\Models\CreateCreditCardPaymentRequest();
$creditCard->capture = true;
$creditCard->installments = 2;
$creditCard->card = new \BspagApiLib\Models\CreateCardRequest();
$creditCard->card->number = "4000000000000010";
$creditCard->card->holderName = "Jean-Luc Picard";
$creditCard->card->expMonth = 1;
$creditCard->card->expYear = 2025;
$creditCard->card->cvv = "123";

$request = new \BspagApiLib\Models\CreateOrderRequest();

$request->items = [new \BspagApiLib\Models\CreateOrderItemRequest()];
$request->items[0]->description = "Uss Enterprise";
$request->items[0]->quantity = 3;
$request->items[0]->amount = 1490; // this value should be in cents

$request->payments = [new \BspagApiLib\Models\CreatePaymentRequest()];
$request->payments[0]->paymentMethod = "credit_card";
$request->payments[0]->creditCard = $creditCard;
$request->customer = $customer;

$result = $orderController->createOrder($request);

echo json_encode($result, JSON_PRETTY_PRINT);
