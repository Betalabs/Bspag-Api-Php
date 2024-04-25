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
 *Request for creating a new charge
 */
class CreateChargeRequest implements JsonSerializable
{
    /**
     * Code
     * @required
     * @var string $code public property
     */
    public $code;

    /**
     * The amount of the charge, in cents
     * @required
     * @var integer $amount public property
     */
    public $amount;

    /**
     * The customer's id
     * @required
     * @maps customer_id
     * @var string $customerId public property
     */
    public $customerId;

    /**
     * Customer data
     * @required
     * @var \BspagApiLib\Models\CreateCustomerRequest $customer public property
     */
    public $customer;

    /**
     * Payment data
     * @required
     * @var \BspagApiLib\Models\CreatePaymentRequest $payment public property
     */
    public $payment;

    /**
     * Metadata
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * The charge due date
     * @maps due_at
     * @factory \BspagApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $dueAt public property
     */
    public $dueAt;

    /**
     * @todo Write general description for this property
     * @required
     * @var \BspagApiLib\Models\CreateAntifraudRequest $antifraud public property
     */
    public $antifraud;

    /**
     * Order Id
     * @required
     * @maps order_id
     * @var string $orderId public property
     */
    public $orderId;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                  $code       Initialization value for $this->code
     * @param integer                 $amount     Initialization value for $this->amount
     * @param string                  $customerId Initialization value for $this->customerId
     * @param CreateCustomerRequest   $customer   Initialization value for $this->customer
     * @param CreatePaymentRequest    $payment    Initialization value for $this->payment
     * @param array                   $metadata   Initialization value for $this->metadata
     * @param \DateTime               $dueAt      Initialization value for $this->dueAt
     * @param CreateAntifraudRequest  $antifraud  Initialization value for $this->antifraud
     * @param string                  $orderId    Initialization value for $this->orderId
     */
    public function __construct()
    {
        if (9 == func_num_args()) {
            $this->code       = func_get_arg(0);
            $this->amount     = func_get_arg(1);
            $this->customerId = func_get_arg(2);
            $this->customer   = func_get_arg(3);
            $this->payment    = func_get_arg(4);
            $this->metadata   = func_get_arg(5);
            $this->dueAt      = func_get_arg(6);
            $this->antifraud  = func_get_arg(7);
            $this->orderId    = func_get_arg(8);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['code']        = $this->code;
        $json['amount']      = $this->amount;
        $json['customer_id'] = $this->customerId;
        $json['customer']    = $this->customer;
        $json['payment']     = $this->payment;
        $json['metadata']    = $this->metadata;
        $json['due_at']      = isset($this->dueAt) ?
            DateTimeHelper::toRfc3339DateTime($this->dueAt) : null;
        $json['antifraud']   = $this->antifraud;
        $json['order_id']    = $this->orderId;

        return $json;
    }
}
