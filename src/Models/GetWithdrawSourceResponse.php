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
class GetWithdrawSourceResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @maps source_id
     * @var string $sourceId public property
     */
    public $sourceId;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $sourceId Initialization value for $this->sourceId
     * @param string $type     Initialization value for $this->type
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->sourceId = func_get_arg(0);
            $this->type     = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['source_id'] = $this->sourceId;
        $json['type']      = $this->type;

        return $json;
    }
}
