<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$orderController = $apiClient->getOrders();

$customer = new \BspagApiLib\Models\CreateCustomerRequest();
$customer->name = "sdk customer test";

$voucher = new \BspagApiLib\Models\CreateVoucherPaymentRequest();
$voucher->capture = True;
$voucher->installments = 2;
$voucher->statementDescriptor = "test descriptor";
$voucher->card = new \BspagApiLib\Models\CreateCardRequest();
$voucher->card->number = "4000000000000010";
$voucher->card->holderName = "James Kirk";
$voucher->card->expMonth = 1;
$voucher->card->expYear = 2025;
$voucher->card->cvv = "123";

$request = new \BspagApiLib\Models\CreateOrderRequest();

$request->items = [new \BspagApiLib\Models\CreateOrderItemRequest()];
$request->items[0]->description = "Tesseract Bracelet";
$request->items[0]->quantity = 3;
$request->items[0]->amount = 1490; // this value should be in cents

$request->payments = [new \BspagApiLib\Models\CreatePaymentRequest()];
$request->payments[0]->paymentMethod = "voucher";
$request->payments[0]->voucher = $voucher;
$request->customer = $customer;

$result = $orderController->createOrder($request);

echo json_encode($result, JSON_PRETTY_PRINT);
