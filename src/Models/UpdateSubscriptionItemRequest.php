<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Request for updating a subscription item
 */
class UpdateSubscriptionItemRequest implements JsonSerializable
{
    /**
     * Description
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * Status
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * Pricing scheme
     * @required
     * @maps pricing_scheme
     * @var \BetaPayApiLib\Models\UpdatePricingSchemeRequest $pricingScheme public property
     */
    public $pricingScheme;

    /**
     * Item name
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * Number of cycles that the item will be charged
     * @var integer|null $cycles public property
     */
    public $cycles;

    /**
     * Quantity
     * @var integer|null $quantity public property
     */
    public $quantity;

    /**
     * Minimum price
     * @maps minimum_price
     * @var integer|null $minimumPrice public property
     */
    public $minimumPrice;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                     $description   Initialization value for $this->description
     * @param string                     $status        Initialization value for $this->status
     * @param UpdatePricingSchemeRequest $pricingScheme Initialization value for $this->pricingScheme
     * @param string                     $name          Initialization value for $this->name
     * @param integer                    $cycles        Initialization value for $this->cycles
     * @param integer                    $quantity      Initialization value for $this->quantity
     * @param integer                    $minimumPrice  Initialization value for $this->minimumPrice
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->description   = func_get_arg(0);
            $this->status        = func_get_arg(1);
            $this->pricingScheme = func_get_arg(2);
            $this->name          = func_get_arg(3);
            $this->cycles        = func_get_arg(4);
            $this->quantity      = func_get_arg(5);
            $this->minimumPrice  = func_get_arg(6);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['description']    = $this->description;
        $json['status']         = $this->status;
        $json['pricing_scheme'] = $this->pricingScheme;
        $json['name']           = $this->name;
        $json['cycles']         = $this->cycles;
        $json['quantity']       = $this->quantity;
        $json['minimum_price']  = $this->minimumPrice;

        return $json;
    }
}
