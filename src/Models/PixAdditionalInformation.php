<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Pix Additional Information
 */
class PixAdditionalInformation implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @maps Name
     * @var string $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @required
     * @maps Value
     * @var string $value public property
     */
    public $value;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name  Initialization value for $this->name
     * @param string $value Initialization value for $this->value
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->name  = func_get_arg(0);
            $this->value = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['Name']  = $this->name;
        $json['Value'] = $this->value;

        return $json;
    }
}
