<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BetaPayApiLib\BetaPayApiClient($basicAuthUserName, $basicAuthPassword);

$recipientsController = $apiClient->getRecipients();

$request = new \BetaPayApiLib\Models\CreateRecipientRequest();
$request->name = "Katerine Janeway";
$request->email = "janeway@starfleet.com";
$request->description = "Recebedor da nave Voyager";
$request->document = "55342429064";
$request->type = "individual";
$request->defaultBankAccount = new \BetaPayApiLib\Models\CreateBankAccountRequest();
$request->defaultBankAccount->holderName = "Katerine Janeway";
$request->defaultBankAccount->holderType = "individual";
$request->defaultBankAccount->holderDocument = "55342429064";
$request->defaultBankAccount->bank = "341";
$request->defaultBankAccount->branchNumber = "12345";
$request->defaultBankAccount->branchCheckDigit = "6";
$request->defaultBankAccount->accountNumber = "12345";
$request->defaultBankAccount->accountCheckDigit = "6";
$request->defaultBankAccount->type = "checking";

$result = $recipientsController->createRecipient($request);

echo json_encode($result, JSON_PRETTY_PRINT);
