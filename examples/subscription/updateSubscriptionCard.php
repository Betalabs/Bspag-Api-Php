<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BspagApiLib\BspagApiClient($basicAuthUserName, $basicAuthPassword);

$subscriptionsController = $apiClient->getSubscriptions();

$subscriptionId = "sub_ExAmPlExxxxxxxxx";

$request = new \BspagApiLib\Models\UpdateSubscriptionCardRequest();
$request->card = new \BspagApiLib\Models\CreateCardRequest();
$request->card->number = "4532912167490007";
$request->card->holderName = "Benjamin Sisko";
$request->card->expMonth = 1;
$request->card->expYear = 2028;
$request->card->cvv = "123";
$request->card->billingAddress = new \BspagApiLib\Models\CreateAddressRequest();
$request->card->billingAddress->line1 = "Av. Paulista";
$request->card->billingAddress->line2 = "10º andar";
$request->card->billingAddress->zipCode = "01311000";
$request->card->billingAddress->city = "São Paulo";
$request->card->billingAddress->state = "SP";
$request->card->billingAddress->country = "BR";

$result = $subscriptionsController->updateSubscriptionCard($subscriptionId, $request);

echo json_encode($result, JSON_PRETTY_PRINT);
