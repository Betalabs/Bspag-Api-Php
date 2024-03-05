<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Request for creating a new discount
 */
class CreateDiscountRequest implements JsonSerializable
{
    /**
     * The discount value
     * @required
     * @var double $value public property
     */
    public $value;

    /**
     * Discount type. Can be either flat or percentage.
     * @required
     * @maps discount_type
     * @var string $discountType public property
     */
    public $discountType;

    /**
     * The item where the discount will be applied
     * @required
     * @maps item_id
     * @var string $itemId public property
     */
    public $itemId;

    /**
     * Number of cycles that the discount will be applied
     * @var integer|null $cycles public property
     */
    public $cycles;

    /**
     * Description
     * @var string|null $description public property
     */
    public $description;

    /**
     * Constructor to set initial or default values of member properties
     * @param double  $value        Initialization value for $this->value
     * @param string  $discountType Initialization value for $this->discountType
     * @param string  $itemId       Initialization value for $this->itemId
     * @param integer $cycles       Initialization value for $this->cycles
     * @param string  $description  Initialization value for $this->description
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->value        = func_get_arg(0);
            $this->discountType = func_get_arg(1);
            $this->itemId       = func_get_arg(2);
            $this->cycles       = func_get_arg(3);
            $this->description  = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['value']         = $this->value;
        $json['discount_type'] = $this->discountType;
        $json['item_id']       = $this->itemId;
        $json['cycles']        = $this->cycles;
        $json['description']   = $this->description;

        return $json;
    }
}
