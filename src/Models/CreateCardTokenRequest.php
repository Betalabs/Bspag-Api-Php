<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Card token data
 */
class CreateCardTokenRequest implements JsonSerializable
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
     * Card brand
     * @required
     * @var string $brand public property
     */
    public $brand;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $label public property
     */
    public $label;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $number     Initialization value for $this->number
     * @param string  $holderName Initialization value for $this->holderName
     * @param integer $expMonth   Initialization value for $this->expMonth
     * @param integer $expYear    Initialization value for $this->expYear
     * @param string  $cvv        Initialization value for $this->cvv
     * @param string  $brand      Initialization value for $this->brand
     * @param string  $label      Initialization value for $this->label
     */
    public function __construct()
    {
        if (7 == func_num_args()) {
            $this->number     = func_get_arg(0);
            $this->holderName = func_get_arg(1);
            $this->expMonth   = func_get_arg(2);
            $this->expYear    = func_get_arg(3);
            $this->cvv        = func_get_arg(4);
            $this->brand      = func_get_arg(5);
            $this->label      = func_get_arg(6);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['number']      = $this->number;
        $json['holder_name'] = $this->holderName;
        $json['exp_month']   = $this->expMonth;
        $json['exp_year']    = $this->expYear;
        $json['cvv']         = $this->cvv;
        $json['brand']       = $this->brand;
        $json['label']       = $this->label;

        return $json;
    }
}
