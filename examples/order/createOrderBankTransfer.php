<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$orderController = $apiClient->getOrders();

$customer = new \BspagApiLib\Models\CreateCustomerRequest();
$customer->name = "Jean-Luc Picard";
$customer->email = "picard@starfleet.com";

$bankTransfer = new \BspagApiLib\Models\CreateBankTransferPaymentRequest();
$bankTransfer->bank = "001";

$request = new \BspagApiLib\Models\CreateOrderRequest();

$request->items = [new \BspagApiLib\Models\CreateOrderItemRequest()];
$request->items[0]->description = "Holodeck";
$request->items[0]->quantity = 2;
$request->items[0]->amount = 9990; // this value should be in cents

$request->payments = [new \BspagApiLib\Models\CreatePaymentRequest()];
$request->payments[0]->paymentMethod = "bank_transfer";
$request->payments[0]->bankTransfer = $bankTransfer;
$request->customer = $customer;

$result = $orderController->createOrder($request);

echo json_encode($result, JSON_PRETTY_PRINT);
