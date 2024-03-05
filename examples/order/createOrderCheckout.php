<?php

require_once  "../vendor/autoload.php" ;

$basicAuthUserName = 'basicAuthUserName'; // The username to use with basic authentication
$basicAuthPassword = 'basicAuthPassword'; // The password to use with basic authentication

$apiclient = new BetaPayApiLib\BetaPayApiClient($basicAuthUserName, $basicAuthPassword);

$orderController = $apiClient->getOrders();

$customer = new \BetaPayApiLib\Models\CreateCustomerRequest();
$customer->name = "sdk customer test";
$customer->email = "picard@starfleet.com";

$checkout = new \BetaPayApiLib\Models\CreateCheckoutPaymentRequest();
$checkout->customerEditable = false;
$checkout->skipCheckoutSuccessPage = true;
$checkout->acceptedPaymentMethods = ["credit_card", "boleto", "bank_transfer", "debit_card"];
$checkout->acceptedMultiPaymentMethods = [["credit_card", "credit_card"], ["credit_card", "boleto"]];
$checkout->successUrl = "https://www.mundipagg.com";

//Bank transfer payment Setup;
$checkout->bankTransfer = new \BetaPayApiLib\Models\CreateCheckoutBankTransferRequest();
$checkout->bankTransfer->bank = ["237", "001", "341"];

//Boleto Payment Setup;
$checkout->boleto = new \BetaPayApiLib\Models\CreateCheckoutBoletoPaymentRequest();
$checkout->boleto->bank = "033";
$checkout->boleto->instructions ="Pagar ate o vencimento";
$checkout->boleto->dueAt = new \DateTime("2021-07-25T00:00:00Z");

//Credit Card Payment Setup;
$checkout->creditCard = new \BetaPayApiLib\Models\CreateCheckoutCreditCardPaymentRequest();
$checkout->creditCard->capture = true;
$checkout->creditCard->statement_descriptor = "Descriptor example";
$checkout->creditCard->installments = [ //Credit card installments Setup
    new \BetaPayApiLib\Models\CreateCheckoutCardInstallmentOptionRequest(),
    new \BetaPayApiLib\Models\CreateCheckoutCardInstallmentOptionRequest()
];
// installment 1;
$checkout->creditCard->installments[0]->number = 1;
$checkout->creditCard->installments[0]->total = 2000;
// installment 2 with extra tax of 500;
$checkout->creditCard->installments[1]->number = 1;
$checkout->creditCard->installments[1]->total = 2500;

// Debit Card Payment Setup;
$checkout->debitCard = new \BetaPayApiLib\Models\CreateCheckoutDebitCardPaymentRequest();
// Debit card Authentication Setup;
$checkout->debitCard->authentication = new \BetaPayApiLib\Models\CreatePaymentAuthenticationRequest();
$checkout->debitCard->authentication->type = 'threed_secure';
$checkout->debitCard->authentication->threedSecure = new \BetaPayApiLib\Models\CreateThreeDSecureRequest();
$checkout->debitCard->authentication->threedSecure->mpi = "acquirer";
$checkout->debitCard->authentication->threedSecure->successUrl = "https://www.betapay.com";

$request = new \BetaPayApiLib\Models\CreateOrderRequest();

$request->items = [new \BetaPayApiLib\Models\CreateOrderItemRequest()];
$request->items[0]->description = "Tesseract Bracelet";
$request->items[0]->quantity = 3;
$request->items[0]->amount = 1490; // this value should be in cents

$request->payments = [new \BetaPayApiLib\Models\CreatePaymentRequest()];
$request->payments[0]->amount = 2000; // this value should be in cents
$request->payments[0]->paymentMethod = "checkout";
$request->payments[0]->checkout = $checkout;
$request->customer = $customer;

$result = new \BetaPayApiLib\Models\GetOrderResponse();
$result->checkouts = [new \BetaPayApiLib\Models\GetCheckoutPaymentResponse()];
$result = $orderController->createOrder($request);

echo json_encode($result, JSON_PRETTY_PRINT);
