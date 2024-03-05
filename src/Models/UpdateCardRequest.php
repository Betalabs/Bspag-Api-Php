<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Request for updating a card
 */
class UpdateCardRequest implements JsonSerializable
{
    /**
     * Holder name
     * @required
     * @maps holder_name
     * @var string $holderName public property
     */
    public $holderName;

    /**
     * Expiration month
     * @required
     * @maps exp_month
     * @var integer $expMonth public property
     */
    public $expMonth;

    /**
     * Expiration year
     * @required
     * @maps exp_year
     * @var integer $expYear public property
     */
    public $expYear;

    /**
     * Id of the address to be used as billing address
     * @required
     * @maps billing_address_id
     * @var string $billingAddressId public property
     */
    public $billingAddressId;

    /**
     * Billing address
     * @required
     * @maps billing_address
     * @var \BetaPayApiLib\Models\CreateAddressRequest $billingAddress public property
     */
    public $billingAddress;

    /**
     * Metadata
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $label public property
     */
    public $label;

    /**
     * Constructor to set initial or default values of member properties
     * @param string               $holderName       Initialization value for $this->holderName
     * @param integer              $expMonth         Initialization value for $this->expMonth
     * @param integer              $expYear          Initialization value for $this->expYear
     * @param string               $billingAddressId Initialization value for $this->billingAddressId
     * @param CreateAddressRequest $billingAddress   Initialization value for $this->billingAddress
     * @param array                $metadata         Initialization value for $this->metadata
     * @param string               $label            Initialization value for $this->label
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->holderName       = func_get_arg(0);
            $this->expMonth         = func_get_arg(1);
            $this->expYear          = func_get_arg(2);
            $this->billingAddressId = func_get_arg(3);
            $this->billingAddress   = func_get_arg(4);
            $this->metadata         = func_get_arg(5);
            $this->label            = func_get_arg(6);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['holder_name']        = $this->holderName;
        $json['exp_month']          = $this->expMonth;
        $json['exp_year']           = $this->expYear;
        $json['billing_address_id'] = $this->billingAddressId;
        $json['billing_address']    = $this->billingAddress;
        $json['metadata']           = $this->metadata;
        $json['label']              = $this->label;

        return $json;
    }
}
