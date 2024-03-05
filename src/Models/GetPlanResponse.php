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
 *Response object for getting a plan
 */
class GetPlanResponse implements JsonSerializable
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
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $url public property
     */
    public $url;

    /**
     * @todo Write general description for this property
     * @required
     * @maps statement_descriptor
     * @var string $statementDescriptor public property
     */
    public $statementDescriptor;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $interval public property
     */
    public $interval;

    /**
     * @todo Write general description for this property
     * @required
     * @maps interval_count
     * @var integer $intervalCount public property
     */
    public $intervalCount;

    /**
     * @todo Write general description for this property
     * @required
     * @maps billing_type
     * @var string $billingType public property
     */
    public $billingType;

    /**
     * @todo Write general description for this property
     * @required
     * @maps payment_methods
     * @var array $paymentMethods public property
     */
    public $paymentMethods;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $installments public property
     */
    public $installments;

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
     * @maps created_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $createdAt public property
     */
    public $createdAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps updated_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $updatedAt public property
     */
    public $updatedAt;

    /**
     * @todo Write general description for this property
     * @required
     * @var \BetaPayApiLib\Models\GetPlanItemResponse[] $items public property
     */
    public $items;

    /**
     * @todo Write general description for this property
     * @required
     * @maps billing_days
     * @var array $billingDays public property
     */
    public $billingDays;

    /**
     * @todo Write general description for this property
     * @required
     * @var bool $shippable public property
     */
    public $shippable;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * @todo Write general description for this property
     * @maps trial_period_days
     * @var integer|null $trialPeriodDays public property
     */
    public $trialPeriodDays;

    /**
     * @todo Write general description for this property
     * @maps minimum_price
     * @var integer|null $minimumPrice public property
     */
    public $minimumPrice;

    /**
     * @todo Write general description for this property
     * @maps deleted_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $deletedAt public property
     */
    public $deletedAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param string    $id                  Initialization value for $this->id
     * @param string    $name                Initialization value for $this->name
     * @param string    $description         Initialization value for $this->description
     * @param string    $url                 Initialization value for $this->url
     * @param string    $statementDescriptor Initialization value for $this->statementDescriptor
     * @param string    $interval            Initialization value for $this->interval
     * @param integer   $intervalCount       Initialization value for $this->intervalCount
     * @param string    $billingType         Initialization value for $this->billingType
     * @param array     $paymentMethods      Initialization value for $this->paymentMethods
     * @param array     $installments        Initialization value for $this->installments
     * @param string    $status              Initialization value for $this->status
     * @param string    $currency            Initialization value for $this->currency
     * @param \DateTime $createdAt           Initialization value for $this->createdAt
     * @param \DateTime $updatedAt           Initialization value for $this->updatedAt
     * @param array     $items               Initialization value for $this->items
     * @param array     $billingDays         Initialization value for $this->billingDays
     * @param bool      $shippable           Initialization value for $this->shippable
     * @param array     $metadata            Initialization value for $this->metadata
     * @param integer   $trialPeriodDays     Initialization value for $this->trialPeriodDays
     * @param integer   $minimumPrice        Initialization value for $this->minimumPrice
     * @param \DateTime $deletedAt           Initialization value for $this->deletedAt
     */
    public function __construct()
    {
        if (21 == func_num_args()) {
            $this->id                  = func_get_arg(0);
            $this->name                = func_get_arg(1);
            $this->description         = func_get_arg(2);
            $this->url                 = func_get_arg(3);
            $this->statementDescriptor = func_get_arg(4);
            $this->interval            = func_get_arg(5);
            $this->intervalCount       = func_get_arg(6);
            $this->billingType         = func_get_arg(7);
            $this->paymentMethods      = func_get_arg(8);
            $this->installments        = func_get_arg(9);
            $this->status              = func_get_arg(10);
            $this->currency            = func_get_arg(11);
            $this->createdAt           = func_get_arg(12);
            $this->updatedAt           = func_get_arg(13);
            $this->items               = func_get_arg(14);
            $this->billingDays         = func_get_arg(15);
            $this->shippable           = func_get_arg(16);
            $this->metadata            = func_get_arg(17);
            $this->trialPeriodDays     = func_get_arg(18);
            $this->minimumPrice        = func_get_arg(19);
            $this->deletedAt           = func_get_arg(20);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']                   = $this->id;
        $json['name']                 = $this->name;
        $json['description']          = $this->description;
        $json['url']                  = $this->url;
        $json['statement_descriptor'] = $this->statementDescriptor;
        $json['interval']             = $this->interval;
        $json['interval_count']       = $this->intervalCount;
        $json['billing_type']         = $this->billingType;
        $json['payment_methods']      = $this->paymentMethods;
        $json['installments']         = $this->installments;
        $json['status']               = $this->status;
        $json['currency']             = $this->currency;
        $json['created_at']           = DateTimeHelper::toRfc3339DateTime($this->createdAt);
        $json['updated_at']           = DateTimeHelper::toRfc3339DateTime($this->updatedAt);
        $json['items']                = $this->items;
        $json['billing_days']         = $this->billingDays;
        $json['shippable']            = $this->shippable;
        $json['metadata']             = $this->metadata;
        $json['trial_period_days']    = $this->trialPeriodDays;
        $json['minimum_price']        = $this->minimumPrice;
        $json['deleted_at']           = isset($this->deletedAt) ?
            DateTimeHelper::toRfc3339DateTime($this->deletedAt) : null;

        return $json;
    }
}
