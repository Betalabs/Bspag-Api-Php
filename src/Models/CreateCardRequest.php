<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Card data
 */
class CreateCardRequest implements JsonSerializable
{
    /**
     * Credit card number
     * @required
     * @var string $number public property
     */
    public $number;

    /**
     * Holder name, as written on the card
     * @required
     * @maps holder_name
     * @var string $holderName public property
     */
    public $holderName;

    /**
     * The expiration month
     * @required
     * @maps exp_month
     * @var integer $expMonth public property
     */
    public $expMonth;

    /**
     * The expiration year, that can be informed with 2 or 4 digits
     * @required
     * @maps exp_year
     * @var integer $expYear public property
     */
    public $expYear;

    /**
     * The card's security code
     * @required
     * @var string $cvv public property
     */
    public $cvv;

    /**
     * Card's billing address
     * @required
     * @maps billing_address
     * @var \BetaPayApiLib\Models\CreateAddressRequest $billingAddress public property
     */
    public $billingAddress;

    /**
     * Card brand
     * @required
     * @var string $brand public property
     */
    public $brand;

    /**
     * The address id for the billing address
     * @required
     * @maps billing_address_id
     * @var string $billingAddressId public property
     */
    public $billingAddressId;

    /**
     * Metadata
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * Card type
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * Options for creating the card
     * @required
     * @var \BetaPayApiLib\Models\CreateCardOptionsRequest $options public property
     */
    public $options;

    /**
     * Document number for the card's holder
     * @maps holder_document
     * @var string|null $holderDocument public property
     */
    public $holderDocument;

    /**
     * Indicates whether it is a private label card
     * @required
     * @maps private_label
     * @var bool $privateLabel public property
     */
    public $privateLabel;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $label public property
     */
    public $label;

    /**
     * Identifier
     * @var string|null $id public property
     */
    public $id;

    /**
     * token identifier
     * @var string|null $token public property
     */
    public $token;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                   $number           Initialization value for $this->number
     * @param string                   $holderName       Initialization value for $this->holderName
     * @param integer                  $expMonth         Initialization value for $this->expMonth
     * @param integer                  $expYear          Initialization value for $this->expYear
     * @param string                   $cvv              Initialization value for $this->cvv
     * @param CreateAddressRequest     $billingAddress   Initialization value for $this->billingAddress
     * @param string                   $brand            Initialization value for $this->brand
     * @param string                   $billingAddressId Initialization value for $this->billingAddressId
     * @param array                    $metadata         Initialization value for $this->metadata
     * @param string                   $type             Initialization value for $this->type
     * @param CreateCardOptionsRequest $options          Initialization value for $this->options
     * @param string                   $holderDocument   Initialization value for $this->holderDocument
     * @param bool                     $privateLabel     Initialization value for $this->privateLabel
     * @param string                   $label            Initialization value for $this->label
     * @param string                   $id               Initialization value for $this->id
     * @param string                   $token            Initialization value for $this->token
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 16:
                $this->number           = func_get_arg(0);
                $this->holderName       = func_get_arg(1);
                $this->expMonth         = func_get_arg(2);
                $this->expYear          = func_get_arg(3);
                $this->cvv              = func_get_arg(4);
                $this->billingAddress   = func_get_arg(5);
                $this->brand            = func_get_arg(6);
                $this->billingAddressId = func_get_arg(7);
                $this->metadata         = func_get_arg(8);
                $this->type             = func_get_arg(9);
                $this->options          = func_get_arg(10);
                $this->holderDocument   = func_get_arg(11);
                $this->privateLabel     = func_get_arg(12);
                $this->label            = func_get_arg(13);
                $this->id               = func_get_arg(14);
                $this->token            = func_get_arg(15);
                break;

            default:
                $this->type = 'credit';
                break;
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['number']             = $this->number;
        $json['holder_name']        = $this->holderName;
        $json['exp_month']          = $this->expMonth;
        $json['exp_year']           = $this->expYear;
        $json['cvv']                = $this->cvv;
        $json['billing_address']    = $this->billingAddress;
        $json['brand']              = $this->brand;
        $json['billing_address_id'] = $this->billingAddressId;
        $json['metadata']           = $this->metadata;
        $json['type']               = $this->type;
        $json['options']            = $this->options;
        $json['holder_document']    = $this->holderDocument;
        $json['private_label']      = $this->privateLabel;
        $json['label']              = $this->label;
        $json['id']                 = $this->id;
        $json['token']              = $this->token;

        return $json;
    }
}
