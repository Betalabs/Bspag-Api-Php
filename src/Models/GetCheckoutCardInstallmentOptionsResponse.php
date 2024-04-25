<?php
/*
 * BspagApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BspagApiLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GetCheckoutCardInstallmentOptionsResponse implements JsonSerializable
{
    /**
     * Número de parcelas
     * @required
     * @var string $number public property
     */
    public $number;

    /**
     * Valor total da compra
     * @required
     * @var integer $total public property
     */
    public $total;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $number Initialization value for $this->number
     * @param integer $total  Initialization value for $this->total
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->number = func_get_arg(0);
            $this->total  = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['number'] = $this->number;
        $json['total']  = $this->total;

        return $json;
    }
}
