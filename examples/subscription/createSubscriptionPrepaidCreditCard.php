<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$subscriptionsController = $apiClient->getSubscriptions();

$request = new \BspagApiLib\Models\CreateSubscriptionRequest();
$request->paymentMethod = "credit_card";
$request->currency = "BRL";
$request->interval = "month";
$request->intervalCount = 3;
$request->billingType = "prepaid";
$request->installments = 3;
$request->minimumPrice = 10000; // this value should be in cents
$request->boletoDueDays = 5;

$request->customer = new \BspagApiLib\Models\CreateCustomerRequest();
$request->customer->name = "James T. Kirk";
$request->customer->email = "jim@starfleet.com";

$request->card = new \BspagApiLib\Models\CreateCardRequest();
$request->card->holderName = "James Kirk";
$request->card->number = "4000000000000010";
$request->card->expMonth = 1;
$request->card->expYear = 26;
$request->card->cvv = "903";
$request->card->billingAddress = new \BspagApiLib\Models\CreateAddressRequest();
$request->card->billingAddress->line1 = "Avenida Paulista, XXXX";
$request->card->billingAddress->line2 = "9º andar";
$request->card->billingAddress->zipCode = "01310100";
$request->card->billingAddress->city = "São Paulo";
$request->card->billingAddress->state = "SP";
$request->card->billingAddress->country = "BR";

$request->discounts = [new \BspagApiLib\Models\CreateDiscountRequest()];
$request->discounts[0]->cycles = 3;
$request->discounts[0]->value = 10;
$request->discounts[0]->discountType = "percentage";

$request->increments = [new \BspagApiLib\Models\CreateIncrementRequest()];
$request->increments[0]->cycles = 2;
$request->increments[0]->value = 20;

$request->items = [
    new \BspagApiLib\Models\CreateSubscriptionItemRequest(),
    new \BspagApiLib\Models\CreateSubscriptionItemRequest()];

$request->items[0]->description = "Musculação";
$request->items[0]->quantity = 1;
$request->items[0]->pricingScheme = new \BspagApiLib\Models\CreatePricingSchemeRequest();
$request->items[0]->pricingScheme->price = 18990; // this value should be in cents

$request->items[1]->description = "Matrícula";
$request->items[1]->quantity = 1;
$request->items[1]->cycles = 1;
$request->items[1]->pricingScheme = new \BspagApiLib\Models\CreatePricingSchemeRequest();
$request->items[1]->pricingScheme->price = 5990; // this value should be in cents

$result = $subscriptionsController->createSubscription($request);

echo json_encode($result, JSON_PRETTY_PRINT);
