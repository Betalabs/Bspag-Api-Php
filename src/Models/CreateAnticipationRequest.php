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
 *Request for creating an anticipation
 */
class CreateAnticipationRequest implements JsonSerializable
{
    /**
     * Amount requested for the anticipation
     * @required
     * @var integer $amount public property
     */
    public $amount;

    /**
     * Timeframe
     * @required
     * @var string $timeframe public property
     */
    public $timeframe;

    /**
     * Payment date
     * @required
     * @maps payment_date
     * @factory \BspagApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $paymentDate public property
     */
    public $paymentDate;

    /**
     * Constructor to set initial or default values of member properties
     * @param integer   $amount      Initialization value for $this->amount
     * @param string    $timeframe   Initialization value for $this->timeframe
     * @param \DateTime $paymentDate Initialization value for $this->paymentDate
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->amount      = func_get_arg(0);
            $this->timeframe   = func_get_arg(1);
            $this->paymentDate = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['amount']       = $this->amount;
        $json['timeframe']    = $this->timeframe;
        $json['payment_date'] = DateTimeHelper::toRfc3339DateTime($this->paymentDate);

        return $json;
    }
}
