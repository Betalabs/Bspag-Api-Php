<?php
/*
 * BspagApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BspagApiLib\Models;

use JsonSerializable;

/**
 *Token data
 */
class CreateTokenRequest implements JsonSerializable
{
    /**
     * Token type
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * Card data
     * @required
     * @var \BspagApiLib\Models\CreateCardTokenRequest $card public property
     */
    public $card;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                 $type Initialization value for $this->type
     * @param CreateCardTokenRequest $card Initialization value for $this->card
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 2:
                $this->type = func_get_arg(0);
                $this->card = func_get_arg(1);
                break;

            default:
                $this->type = 'card';
                break;
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['type'] = $this->type;
        $json['card'] = $this->card;

        return $json;
    }
}
