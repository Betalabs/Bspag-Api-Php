<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BetaPayApiLib\BetaPayApiClient($basicAuthUserName, $basicAuthPassword);

$subscriptionsController = $apiClient->getSubscriptions();

$request = new \BetaPayApiLib\Models\CreateSubscriptionRequest();
$request->paymentMethod = "credit_card";
$request->currency = "BRL";
$request->interval = "month";
$request->intervalCount = 3;
$request->billingType = "prepaid";
$request->installments = 3;
$request->minimumPrice = 10000; // this value should be in cents
$request->boletoDueDays = 5;
$request->startAt = "2020-05-01"; 
$request->customer = new \BetaPayApiLib\Models\CreateCustomerRequest();
$request->customer->name = "James Kirk";
$request->customer->email = "jim.kirk@starfleet.com";

$request->paymentMethod = "boleto";

$request->discounts = [new \BetaPayApiLib\Models\CreateDiscountRequest()];
$request->discounts[0]->cycles = 3;
$request->discounts[0]->value = 10;
$request->discounts[0]->discountType = "percentage";

$request->increments = [new \BetaPayApiLib\Models\CreateIncrementRequest()];
$request->increments[0]->cycles = 2;
$request->increments[0]->value = 20;

$request->items = [
    new \BetaPayApiLib\Models\CreateSubscriptionItemRequest(),
    new \BetaPayApiLib\Models\CreateSubscriptionItemRequest()
];

$request->items[0]->description = "Musculação";
$request->items[0]->quantity = 1;
$request->items[0]->pricingScheme = new \BetaPayApiLib\Models\CreatePricingSchemeRequest();
$request->items[0]->pricingScheme->price = 18990; // this value should be in cents

$request->items[1]->description = "Matrícula";
$request->items[1]->quantity = 1;
$request->items[1]->cycles = 1;
$request->items[1]->pricingScheme = new \BetaPayApiLib\Models\CreatePricingSchemeRequest();
$request->items[1]->pricingScheme->price = 5990; // this value should be in cents

$result = $subscriptionsController->createSubscription($request);

echo json_encode($result, JSON_PRETTY_PRINT);
