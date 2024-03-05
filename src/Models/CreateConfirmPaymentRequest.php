<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CreateConfirmPaymentRequest implements JsonSerializable
{
    /**
     * Description
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * Amount
     * @maps Amount
     * @var integer|null $amount public property
     */
    public $amount;

    /**
     * Code reference
     * @required
     * @maps Code
     * @var string $code public property
     */
    public $code;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $description Initialization value for $this->description
     * @param integer $amount      Initialization value for $this->amount
     * @param string  $code        Initialization value for $this->code
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->description = func_get_arg(0);
            $this->amount      = func_get_arg(1);
            $this->code        = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['description'] = $this->description;
        $json['Amount']      = $this->amount;
        $json['Code']        = $this->code;

        return $json;
    }
}
