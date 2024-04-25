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
class CreateEmvDecryptRequest implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @maps icc_data
     * @var string $iccData public property
     */
    public $iccData;

    /**
     * @todo Write general description for this property
     * @required
     * @maps card_sequence_number
     * @var string $cardSequenceNumber public property
     */
    public $cardSequenceNumber;

    /**
     * @todo Write general description for this property
     * @required
     * @var \BspagApiLib\Models\CreateEmvDataDecryptRequest $data public property
     */
    public $data;

    /**
     * @todo Write general description for this property
     * @var \BspagApiLib\Models\CreateCardPaymentContactlessPOIRequest|null $poi public property
     */
    public $poi;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                                 $iccData            Initialization value for $this->iccData
     * @param string                                 $cardSequenceNumber Initialization value for $this-
     *                                                                     >cardSequenceNumber
     * @param CreateEmvDataDecryptRequest            $data               Initialization value for $this->data
     * @param CreateCardPaymentContactlessPOIRequest $poi                Initialization value for $this->poi
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->iccData            = func_get_arg(0);
            $this->cardSequenceNumber = func_get_arg(1);
            $this->data               = func_get_arg(2);
            $this->poi                = func_get_arg(3);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['icc_data']             = $this->iccData;
        $json['card_sequence_number'] = $this->cardSequenceNumber;
        $json['data']                 = $this->data;
        $json['poi']                  = $this->poi;

        return $json;
    }
}
