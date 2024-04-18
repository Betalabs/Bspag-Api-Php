<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$orderController = $apiClient->getOrders();

$customer = new \BspagApiLib\Models\CreateCustomerRequest();
$customer->name = "sdk customer order";
$customer->email = "picard@starfleet.com";

$creditCard = new \BspagApiLib\Models\CreateCreditCardPaymentRequest();
$creditCard->capture = True;
$creditCard->installments = 2;
$creditCard->statementDescriptor = "descriptor";
$creditCard->card = new \BspagApiLib\Models\CreateCardRequest();
$creditCard->card->number = "411111111111";
$creditCard->card->holderName = "Jean-Luc Picard";
$creditCard->card->expMonth = 1;
$creditCard->card->expYear = 2025;
$creditCard->card->cvv = "123";

$request = new \BspagApiLib\Models\CreateOrderRequest();

$request->items = [new \BspagApiLib\Models\CreateOrderItemRequest()];
$request->items[0]->description = "USS Enterprise NCC-1701-D";
$request->items[0]->quantity = 1;
$request->items[0]->amount = 200000; // this value should be in cents

$request->payments = [new \BspagApiLib\Models\CreatePaymentRequest()];
$request->payments[0]->paymentMethod = "credit_card";
$request->payments[0]->creditCard = $creditCard;
$request->customer = $customer;

$request->payments[0]->split = [
    new \BspagApiLib\Models\CreateSplitRequest(),
    new \BspagApiLib\Models\CreateSplitRequest()
];

$request->payments[0]->split[0]->recipientId = "rp_ExAmPlExxxxxxxxx";
$request->payments[0]->split[0]->amount = 100000; // this value should be in cents
$request->payments[0]->split[0]->type = "flat";

$request->payments[0]->split[1]->recipientId = "rp_xxxxxxxxxExAmPlE";
$request->payments[0]->split[1]->amount = 100000; // this value should be in cents
$request->payments[0]->split[1]->type = "flat";


$result = $orderController->createOrder($request);

echo json_encode($result, JSON_PRETTY_PRINT);
