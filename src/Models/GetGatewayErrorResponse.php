<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Gateway Response
 */
class GetGatewayErrorResponse implements JsonSerializable
{
    /**
     * The message error
     * @required
     * @var string $message public property
     */
    public $message;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $message Initialization value for $this->message
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->message = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['message'] = $this->message;

        return $json;
    }
}
