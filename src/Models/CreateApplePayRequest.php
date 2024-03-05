<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *The ApplePay Token Payment Request
 */
class CreateApplePayRequest implements JsonSerializable
{
    /**
     * The token version
     * @required
     * @var string $version public property
     */
    public $version;

    /**
     * The cryptography data
     * @required
     * @var string $data public property
     */
    public $data;

    /**
     * The ApplePay header request
     * @required
     * @var \BetaPayApiLib\Models\CreateApplePayHeaderRequest $header public property
     */
    public $header;

    /**
     * Detached PKCS #7 signature, Base64 encoded as string
     * @required
     * @var string $signature public property
     */
    public $signature;

    /**
     * ApplePay Merchant identifier
     * @required
     * @maps merchant_identifier
     * @var string $merchantIdentifier public property
     */
    public $merchantIdentifier;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                      $version            Initialization value for $this->version
     * @param string                      $data               Initialization value for $this->data
     * @param CreateApplePayHeaderRequest $header             Initialization value for $this->header
     * @param string                      $signature          Initialization value for $this->signature
     * @param string                      $merchantIdentifier Initialization value for $this->merchantIdentifier
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->version            = func_get_arg(0);
            $this->data               = func_get_arg(1);
            $this->header             = func_get_arg(2);
            $this->signature          = func_get_arg(3);
            $this->merchantIdentifier = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['version']             = $this->version;
        $json['data']                = $this->data;
        $json['header']              = $this->header;
        $json['signature']           = $this->signature;
        $json['merchant_identifier'] = $this->merchantIdentifier;

        return $json;
    }
}
