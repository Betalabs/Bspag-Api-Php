<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Request for creating an order item
 */
class CreateOrderItemRequest implements JsonSerializable
{
    /**
     * Amount
     * @required
     * @var integer $amount public property
     */
    public $amount;

    /**
     * Description
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * Quantity
     * @required
     * @var integer $quantity public property
     */
    public $quantity;

    /**
     * Category
     * @required
     * @var string $category public property
     */
    public $category;

    /**
     * The item code passed by the client
     * @var string|null $code public property
     */
    public $code;

    /**
     * Constructor to set initial or default values of member properties
     * @param integer $amount      Initialization value for $this->amount
     * @param string  $description Initialization value for $this->description
     * @param integer $quantity    Initialization value for $this->quantity
     * @param string  $category    Initialization value for $this->category
     * @param string  $code        Initialization value for $this->code
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->amount      = func_get_arg(0);
            $this->description = func_get_arg(1);
            $this->quantity    = func_get_arg(2);
            $this->category    = func_get_arg(3);
            $this->code        = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['amount']      = $this->amount;
        $json['description'] = $this->description;
        $json['quantity']    = $this->quantity;
        $json['category']    = $this->category;
        $json['code']        = $this->code;

        return $json;
    }
}
