<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BetaPayApiLib\BetaPayApiClient($basicAuthUserName, $basicAuthPassword);

$orderController = $apiClient->getOrders();

$customer = new \BetaPayApiLib\Models\CreateCustomerRequest();
$customer->name = "sdk customer test";

$debitCard = new \BetaPayApiLib\Models\CreateDebitCardPaymentRequest();
$debitCard->statementDescriptor = "test descriptor";
$debitCard->card = new \BetaPayApiLib\Models\CreateCardRequest();
$debitCard->card->number = "4000000000000010";
$debitCard->card->holderName = "James Kirk";
$debitCard->card->expMonth = 1;
$debitCard->card->expYear = 2025;
$debitCard->card->cvv = "123";

$request = new \BetaPayApiLib\Models\CreateOrderRequest();

$request->items = [new \BetaPayApiLib\Models\CreateOrderItemRequest()];
$request->items[0]->description = "Uss Enterprise";
$request->items[0]->quantity = 2;
$request->items[0]->amount = 1490; // this value should be in cents

$request->payments = [new \BetaPayApiLib\Models\CreatePaymentRequest()];
$request->payments[0]->paymentMethod = "debit_card";
$request->payments[0]->debitCard = $debitCard;
$request->customer = $customer;

$result = $orderController->createOrder($request);

echo json_encode($result, JSON_PRETTY_PRINT);
