<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Request for creating a pricing scheme
 */
class CreatePricingSchemeRequest implements JsonSerializable
{
    /**
     * Scheme type
     * @required
     * @maps scheme_type
     * @var string $schemeType public property
     */
    public $schemeType;

    /**
     * Price brackets
     * @required
     * @maps price_brackets
     * @var \BetaPayApiLib\Models\CreatePriceBracketRequest[] $priceBrackets public property
     */
    public $priceBrackets;

    /**
     * Price
     * @var integer|null $price public property
     */
    public $price;

    /**
     * Minimum price
     * @maps minimum_price
     * @var integer|null $minimumPrice public property
     */
    public $minimumPrice;

    /**
     * percentual value used in pricing_scheme Percent
     * @var double|null $percentage public property
     */
    public $percentage;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $schemeType    Initialization value for $this->schemeType
     * @param array   $priceBrackets Initialization value for $this->priceBrackets
     * @param integer $price         Initialization value for $this->price
     * @param integer $minimumPrice  Initialization value for $this->minimumPrice
     * @param double  $percentage    Initialization value for $this->percentage
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->schemeType    = func_get_arg(0);
            $this->priceBrackets = func_get_arg(1);
            $this->price         = func_get_arg(2);
            $this->minimumPrice  = func_get_arg(3);
            $this->percentage    = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['scheme_type']    = $this->schemeType;
        $json['price_brackets'] = $this->priceBrackets;
        $json['price']          = $this->price;
        $json['minimum_price']  = $this->minimumPrice;
        $json['percentage']     = $this->percentage;

        return $json;
    }
}
