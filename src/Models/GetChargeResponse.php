<?php
/*
 * BspagApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BspagApiLib\Models;

use JsonSerializable;
use BspagApiLib\Utils\DateTimeHelper;

/**
 *Response object for getting a charge
 */
class GetChargeResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $code public property
     */
    public $code;

    /**
     * @todo Write general description for this property
     * @required
     * @maps gateway_id
     * @var string $gatewayId public property
     */
    public $gatewayId;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $amount public property
     */
    public $amount;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $currency public property
     */
    public $currency;

    /**
     * @todo Write general description for this property
     * @required
     * @maps payment_method
     * @var string $paymentMethod public property
     */
    public $paymentMethod;

    /**
     * @todo Write general description for this property
     * @required
     * @maps due_at
     * @factory \BspagApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $dueAt public property
     */
    public $dueAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps created_at
     * @factory \BspagApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $createdAt public property
     */
    public $createdAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps updated_at
     * @factory \BspagApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $updatedAt public property
     */
    public $updatedAt;

    /**
     * @todo Write general description for this property
     * @maps last_transaction
     * @var \BspagApiLib\Models\GetTransactionResponse|null $lastTransaction public property
     */
    public $lastTransaction;

    /**
     * @todo Write general description for this property
     * @var \BspagApiLib\Models\GetInvoiceResponse|null $invoice public property
     */
    public $invoice;

    /**
     * @todo Write general description for this property
     * @var \BspagApiLib\Models\GetOrderResponse|null $order public property
     */
    public $order;

    /**
     * @todo Write general description for this property
     * @var \BspagApiLib\Models\GetCustomerResponse|null $customer public property
     */
    public $customer;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * @todo Write general description for this property
     * @maps paid_at
     * @factory \BspagApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $paidAt public property
     */
    public $paidAt;

    /**
     * @todo Write general description for this property
     * @maps canceled_at
     * @factory \BspagApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $canceledAt public property
     */
    public $canceledAt;

    /**
     * Canceled Amount
     * @required
     * @maps canceled_amount
     * @var integer $canceledAmount public property
     */
    public $canceledAmount;

    /**
     * Paid amount
     * @required
     * @maps paid_amount
     * @var integer $paidAmount public property
     */
    public $paidAmount;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                  $id              Initialization value for $this->id
     * @param string                  $code            Initialization value for $this->code
     * @param string                  $gatewayId       Initialization value for $this->gatewayId
     * @param integer                 $amount          Initialization value for $this->amount
     * @param string                  $status          Initialization value for $this->status
     * @param string                  $currency        Initialization value for $this->currency
     * @param string                  $paymentMethod   Initialization value for $this->paymentMethod
     * @param \DateTime               $dueAt           Initialization value for $this->dueAt
     * @param \DateTime               $createdAt       Initialization value for $this->createdAt
     * @param \DateTime               $updatedAt       Initialization value for $this->updatedAt
     * @param GetTransactionResponse  $lastTransaction Initialization value for $this->lastTransaction
     * @param GetInvoiceResponse      $invoice         Initialization value for $this->invoice
     * @param GetOrderResponse        $order           Initialization value for $this->order
     * @param GetCustomerResponse     $customer        Initialization value for $this->customer
     * @param array                   $metadata        Initialization value for $this->metadata
     * @param \DateTime               $paidAt          Initialization value for $this->paidAt
     * @param \DateTime               $canceledAt      Initialization value for $this->canceledAt
     * @param integer                 $canceledAmount  Initialization value for $this->canceledAmount
     * @param integer                 $paidAmount      Initialization value for $this->paidAmount
     */
    public function __construct()
    {
        if (19 == func_num_args()) {
            $this->id              = func_get_arg(0);
            $this->code            = func_get_arg(1);
            $this->gatewayId       = func_get_arg(2);
            $this->amount          = func_get_arg(3);
            $this->status          = func_get_arg(4);
            $this->currency        = func_get_arg(5);
            $this->paymentMethod   = func_get_arg(6);
            $this->dueAt           = func_get_arg(7);
            $this->createdAt       = func_get_arg(8);
            $this->updatedAt       = func_get_arg(9);
            $this->lastTransaction = func_get_arg(10);
            $this->invoice         = func_get_arg(11);
            $this->order           = func_get_arg(12);
            $this->customer        = func_get_arg(13);
            $this->metadata        = func_get_arg(14);
            $this->paidAt          = func_get_arg(15);
            $this->canceledAt      = func_get_arg(16);
            $this->canceledAmount  = func_get_arg(17);
            $this->paidAmount      = func_get_arg(18);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']               = $this->id;
        $json['code']             = $this->code;
        $json['gateway_id']       = $this->gatewayId;
        $json['amount']           = $this->amount;
        $json['status']           = $this->status;
        $json['currency']         = $this->currency;
        $json['payment_method']   = $this->paymentMethod;
        $json['due_at']           = DateTimeHelper::toRfc3339DateTime($this->dueAt);
        $json['created_at']       = DateTimeHelper::toRfc3339DateTime($this->createdAt);
        $json['updated_at']       = DateTimeHelper::toRfc3339DateTime($this->updatedAt);
        $json['last_transaction'] = $this->lastTransaction;
        $json['invoice']          = $this->invoice;
        $json['order']            = $this->order;
        $json['customer']         = $this->customer;
        $json['metadata']         = $this->metadata;
        $json['paid_at']          = isset($this->paidAt) ?
            DateTimeHelper::toRfc3339DateTime($this->paidAt) : null;
        $json['canceled_at']      = isset($this->canceledAt) ?
            DateTimeHelper::toRfc3339DateTime($this->canceledAt) : null;
        $json['canceled_amount']  = $this->canceledAmount;
        $json['paid_amount']      = $this->paidAmount;

        return $json;
    }
}
