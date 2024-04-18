<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$orderController = $apiClient->getOrders();

$customer = new \BspagApiLib\Models\CreateCustomerRequest();
$customer->name = "sdk customer test";
$customer->email = "sisko@starfleet.com";
$customer->address = new \BspagApiLib\Models\CreateAddressRequest();
$customer->address->street = "Starfleet Academy";
$customer->address->number = "1000";
$customer->address->zipCode = "94016";
$customer->address->neighborhood = "Starfleet";
$customer->address->city = "San Francisco";
$customer->address->state = "CA";
$customer->address->country = "US";

$boleto = new \BspagApiLib\Models\CreateBoletoPaymentRequest();
$boleto->bank = "033";
$boleto->instructions = "Pagar até o vencimento";
$boleto->dueAt = new \DateTime('2019-12-31T00:00:00Z');

$request = new \BspagApiLib\Models\CreateOrderRequest();

$request->items = [new \BspagApiLib\Models\CreateOrderItemRequest()];
$request->items[0]->description = "DS9";
$request->items[0]->quantity = 3;
$request->items[0]->amount = 80000; // this value should be in cents

$request->payments = [new \BspagApiLib\Models\CreatePaymentRequest()];
$request->payments[0]->paymentMethod = "boleto";
$request->payments[0]->boleto = $boleto;
$request->customer = $customer;

$result = $orderController->createOrder($request);

echo json_encode($result, JSON_PRETTY_PRINT);
