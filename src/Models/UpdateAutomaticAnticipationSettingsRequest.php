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
class UpdateAutomaticAnticipationSettingsRequest implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @var bool|null $enabled public property
     */
    public $enabled;

    /**
     * @todo Write general description for this property
     * @var string|null $type public property
     */
    public $type;

    /**
     * @todo Write general description for this property
     * @maps volume_percentage
     * @var integer|null $volumePercentage public property
     */
    public $volumePercentage;

    /**
     * @todo Write general description for this property
     * @var integer|null $delay public property
     */
    public $delay;

    /**
     * @todo Write general description for this property
     * @var integer|null $days public property
     */
    public $days;

    /**
     * Constructor to set initial or default values of member properties
     * @param bool    $enabled          Initialization value for $this->enabled
     * @param string  $type             Initialization value for $this->type
     * @param integer $volumePercentage Initialization value for $this->volumePercentage
     * @param integer $delay            Initialization value for $this->delay
     * @param integer $days             Initialization value for $this->days
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
    public function jsonSerialize()
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
