<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *The GooglePay header request
 */
class CreateGooglePayHeaderRequest implements JsonSerializable
{
    /**
     * X.509 encoded key bytes, Base64 encoded as a string
     * @required
     * @maps ephemeral_public_key
     * @var string $ephemeralPublicKey public property
     */
    public $ephemeralPublicKey;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $ephemeralPublicKey Initialization value for $this->ephemeralPublicKey
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->ephemeralPublicKey = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['ephemeral_public_key'] = $this->ephemeralPublicKey;

        return $json;
    }
}
