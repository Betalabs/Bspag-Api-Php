<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;
use BetaPayApiLib\Utils\DateTimeHelper;

/**
 *Response object for getting a boleto transaction
 *
 * @discriminator transaction_type
 * @discriminatorType boleto
 */
class GetBoletoTransactionResponse extends GetTransactionResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $url public property
     */
    public $url;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $barcode public property
     */
    public $barcode;

    /**
     * @todo Write general description for this property
     * @required
     * @maps nosso_numero
     * @var string $nossoNumero public property
     */
    public $nossoNumero;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $bank public property
     */
    public $bank;

    /**
     * @todo Write general description for this property
     * @required
     * @maps document_number
     * @var string $documentNumber public property
     */
    public $documentNumber;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $instructions public property
     */
    public $instructions;

    /**
     * @todo Write general description for this property
     * @required
     * @maps billing_address
     * @var \BetaPayApiLib\Models\GetBillingAddressResponse $billingAddress public property
     */
    public $billingAddress;

    /**
     * @todo Write general description for this property
     * @maps due_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $dueAt public property
     */
    public $dueAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps qr_code
     * @var string $qrCode public property
     */
    public $qrCode;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $line public property
     */
    public $line;

    /**
     * @todo Write general description for this property
     * @required
     * @maps pdf_password
     * @var string $pdfPassword public property
     */
    public $pdfPassword;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $pdf public property
     */
    public $pdf;

    /**
     * @todo Write general description for this property
     * @maps paid_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $paidAt public property
     */
    public $paidAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps paid_amount
     * @var string $paidAmount public property
     */
    public $paidAmount;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * @todo Write general description for this property
     * @maps credit_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $creditAt public property
     */
    public $creditAt;

    /**
     * Soft Descriptor
     * @required
     * @maps statement_descriptor
     * @var string $statementDescriptor public property
     */
    public $statementDescriptor;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                     $url                 Initialization value for $this->url
     * @param string                     $barcode             Initialization value for $this->barcode
     * @param string                     $nossoNumero         Initialization value for $this->nossoNumero
     * @param string                     $bank                Initialization value for $this->bank
     * @param string                     $documentNumber      Initialization value for $this->documentNumber
     * @param string                     $instructions        Initialization value for $this->instructions
     * @param GetBillingAddressResponse  $billingAddress      Initialization value for $this->billingAddress
     * @param \DateTime                  $dueAt               Initialization value for $this->dueAt
     * @param string                     $qrCode              Initialization value for $this->qrCode
     * @param string                     $line                Initialization value for $this->line
     * @param string                     $pdfPassword         Initialization value for $this->pdfPassword
     * @param string                     $pdf                 Initialization value for $this->pdf
     * @param \DateTime                  $paidAt              Initialization value for $this->paidAt
     * @param string                     $paidAmount          Initialization value for $this->paidAmount
     * @param string                     $type                Initialization value for $this->type
     * @param \DateTime                  $creditAt            Initialization value for $this->creditAt
     * @param string                     $statementDescriptor Initialization value for $this->statementDescriptor
     */
    public function __construct()
    {
        if (17 == func_num_args()) {
            $this->url                 = func_get_arg(0);
            $this->barcode             = func_get_arg(1);
            $this->nossoNumero         = func_get_arg(2);
            $this->bank                = func_get_arg(3);
            $this->documentNumber      = func_get_arg(4);
            $this->instructions        = func_get_arg(5);
            $this->billingAddress      = func_get_arg(6);
            $this->dueAt               = func_get_arg(7);
            $this->qrCode              = func_get_arg(8);
            $this->line                = func_get_arg(9);
            $this->pdfPassword         = func_get_arg(10);
            $this->pdf                 = func_get_arg(11);
            $this->paidAt              = func_get_arg(12);
            $this->paidAmount          = func_get_arg(13);
            $this->type                = func_get_arg(14);
            $this->creditAt            = func_get_arg(15);
            $this->statementDescriptor = func_get_arg(16);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['url']                  = $this->url;
        $json['barcode']              = $this->barcode;
        $json['nosso_numero']         = $this->nossoNumero;
        $json['bank']                 = $this->bank;
        $json['document_number']      = $this->documentNumber;
        $json['instructions']         = $this->instructions;
        $json['billing_address']      = $this->billingAddress;
        $json['due_at']               = isset($this->dueAt) ?
            DateTimeHelper::toRfc3339DateTime($this->dueAt) : null;
        $json['qr_code']              = $this->qrCode;
        $json['line']                 = $this->line;
        $json['pdf_password']         = $this->pdfPassword;
        $json['pdf']                  = $this->pdf;
        $json['paid_at']              = isset($this->paidAt) ?
            DateTimeHelper::toRfc3339DateTime($this->paidAt) : null;
        $json['paid_amount']          = $this->paidAmount;
        $json['type']                 = $this->type;
        $json['credit_at']            = isset($this->creditAt) ?
            DateTimeHelper::toRfc3339DateTime($this->creditAt) : null;
        $json['statement_descriptor'] = $this->statementDescriptor;
        $json = array_merge($json, parent::jsonSerialize());

        return $json;
    }
}
