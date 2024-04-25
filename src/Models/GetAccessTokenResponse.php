<?php
/*
 * BspagApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BspagApiLib\Models;

use JsonSerializable;
use BspagApiLib\Utils\DateTimeHelper;

/**
 *Response object for getting a access token
 */
class GetAccessTokenResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $code public property
     */
    public $code;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * @todo Write general description for this property
     * @required
     * @maps created_at
     * @factory \BspagApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $createdAt public property
     */
    public $createdAt;

    /**
     * @todo Write general description for this property
     * @var \BspagApiLib\Models\GetCustomerResponse|null $customer public property
     */
    public $customer;

    /**
     * Constructor to set initial or default values of member properties
     * @param string               $id        Initialization value for $this->id
     * @param string               $code      Initialization value for $this->code
     * @param string               $status    Initialization value for $this->status
     * @param \DateTime            $createdAt Initialization value for $this->createdAt
     * @param GetCustomerResponse  $customer  Initialization value for $this->customer
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->id        = func_get_arg(0);
            $this->code      = func_get_arg(1);
            $this->status    = func_get_arg(2);
            $this->createdAt = func_get_arg(3);
            $this->customer  = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']         = $this->id;
        $json['code']       = $this->code;
        $json['status']     = $this->status;
        $json['created_at'] = DateTimeHelper::toRfc3339DateTime($this->createdAt);
        $json['customer']   = $this->customer;

        return $json;
    }
}
