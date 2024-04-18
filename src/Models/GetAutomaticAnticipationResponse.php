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
class GetAutomaticAnticipationResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var bool $enabled public property
     */
    public $enabled;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * @todo Write general description for this property
     * @required
     * @maps volume_percentage
     * @var integer $volumePercentage public property
     */
    public $volumePercentage;

    /**
     * @todo Write general description for this property
     * @required
     * @var integer $delay public property
     */
    public $delay;

    /**
     * @todo Write general description for this property
     * @required
     * @var array $days public property
     */
    public $days;

    /**
     * Constructor to set initial or default values of member properties
     * @param bool    $enabled          Initialization value for $this->enabled
     * @param string  $type             Initialization value for $this->type
     * @param integer $volumePercentage Initialization value for $this->volumePercentage
     * @param integer $delay            Initialization value for $this->delay
     * @param array   $days             Initialization value for $this->days
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->enabled          = func_get_arg(0);
            $this->type             = func_get_arg(1);
            $this->volumePercentage = func_get_arg(2);
            $this->delay            = func_get_arg(3);
            $this->days             = func_get_arg(4);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['enabled']           = $this->enabled;
        $json['type']              = $this->type;
        $json['volume_percentage'] = $this->volumePercentage;
        $json['delay']             = $this->delay;
        $json['days']              = $this->days;

        return $json;
    }
}
