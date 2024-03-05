<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;
use BetaPayApiLib\Utils\DateTimeHelper;

/**
 *Request for updating a charge due date
 */
class UpdateChargeDueDateRequest implements JsonSerializable
{
    /**
     * The charge's new due date
     * @maps due_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $dueAt public property
     */
    public $dueAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param \DateTime $dueAt Initialization value for $this->dueAt
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->dueAt = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['due_at'] = isset($this->dueAt) ?
            DateTimeHelper::toRfc3339DateTime($this->dueAt) : null;

        return $json;
    }
}
