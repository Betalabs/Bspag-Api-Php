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
class CreatePhonesRequest implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @maps home_phone
     * @var \BetaPayApiLib\Models\CreatePhoneRequest|null $homePhone public property
     */
    public $homePhone;

    /**
     * @todo Write general description for this property
     * @maps mobile_phone
     * @var \BetaPayApiLib\Models\CreatePhoneRequest|null $mobilePhone public property
     */
    public $mobilePhone;

    /**
     * Constructor to set initial or default values of member properties
     * @param CreatePhoneRequest $homePhone   Initialization value for $this->homePhone
     * @param CreatePhoneRequest $mobilePhone Initialization value for $this->mobilePhone
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->homePhone   = func_get_arg(0);
            $this->mobilePhone = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['home_phone']   = $this->homePhone;
        $json['mobile_phone'] = $this->mobilePhone;

        return $json;
    }
}
