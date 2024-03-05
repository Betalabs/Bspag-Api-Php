<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *The settings for creating a private label payment
 */
class CreatePrivateLabelPaymentRequest implements JsonSerializable
{
    /**
     * Number of installments
     * @var integer|null $installments public property
     */
    public $installments;

    /**
     * The text that will be shown on the private label's statement
     * @maps statement_descriptor
     * @var string|null $statementDescriptor public property
     */
    public $statementDescriptor;

    /**
     * Card data
     * @var \BetaPayApiLib\Models\CreateCardRequest|null $card public property
     */
    public $card;

    /**
     * The Card id
     * @maps card_id
     * @var string|null $cardId public property
     */
    public $cardId;

    /**
     * @todo Write general description for this property
     * @maps card_token
     * @var string|null $cardToken public property
     */
    public $cardToken;

    /**
     * Indicates a recurrence
     * @var bool|null $recurrence public property
     */
    public $recurrence;

    /**
     * Indicates if the operation should be only authorization or auth and capture.
     * @var bool|null $capture public property
     */
    public $capture;

    /**
     * Indicates whether the extended label (private label) is enabled
     * @maps extended_limit_enabled
     * @var bool|null $extendedLimitEnabled public property
     */
    public $extendedLimitEnabled;

    /**
     * Extended Limit Code
     * @maps extended_limit_code
     * @var string|null $extendedLimitCode public property
     */
    public $extendedLimitCode;

    /**
     * Constructor to set initial or default values of member properties
     * @param integer           $installments         Initialization value for $this->installments
     * @param string            $statementDescriptor  Initialization value for $this->statementDescriptor
     * @param CreateCardRequest $card                 Initialization value for $this->card
     * @param string            $cardId               Initialization value for $this->cardId
     * @param string            $cardToken            Initialization value for $this->cardToken
     * @param bool              $recurrence           Initialization value for $this->recurrence
     * @param bool              $capture              Initialization value for $this->capture
     * @param bool              $extendedLimitEnabled Initialization value for $this->extendedLimitEnabled
     * @param string            $extendedLimitCode    Initialization value for $this->extendedLimitCode
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 9:
                $this->installments         = func_get_arg(0);
                $this->statementDescriptor  = func_get_arg(1);
                $this->card                 = func_get_arg(2);
                $this->cardId               = func_get_arg(3);
                $this->cardToken            = func_get_arg(4);
                $this->recurrence           = func_get_arg(5);
                $this->capture              = func_get_arg(6);
                $this->extendedLimitEnabled = func_get_arg(7);
                $this->extendedLimitCode    = func_get_arg(8);
                break;

            default:
                $this->installments = 1;
                $this->capture = true;
                break;
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['installments']           = $this->installments;
        $json['statement_descriptor']   = $this->statementDescriptor;
        $json['card']                   = $this->card;
        $json['card_id']                = $this->cardId;
        $json['card_token']             = $this->cardToken;
        $json['recurrence']             = $this->recurrence;
        $json['capture']                = $this->capture;
        $json['extended_limit_enabled'] = $this->extendedLimitEnabled;
        $json['extended_limit_code']    = $this->extendedLimitCode;

        return $json;
    }
}