<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Request for creating a bank account
 */
class CreateBankAccountRequest implements JsonSerializable
{
    /**
     * Bank account holder name
     * @required
     * @maps holder_name
     * @var string $holderName public property
     */
    public $holderName;

    /**
     * Bank account holder type
     * @required
     * @maps holder_type
     * @var string $holderType public property
     */
    public $holderType;

    /**
     * Bank account holder document
     * @required
     * @maps holder_document
     * @var string $holderDocument public property
     */
    public $holderDocument;

    /**
     * Bank
     * @required
     * @var string $bank public property
     */
    public $bank;

    /**
     * Branch number
     * @required
     * @maps branch_number
     * @var string $branchNumber public property
     */
    public $branchNumber;

    /**
     * Branch check digit
     * @required
     * @maps branch_check_digit
     * @var string $branchCheckDigit public property
     */
    public $branchCheckDigit;

    /**
     * Account number
     * @required
     * @maps account_number
     * @var string $accountNumber public property
     */
    public $accountNumber;

    /**
     * Account check digit
     * @required
     * @maps account_check_digit
     * @var string $accountCheckDigit public property
     */
    public $accountCheckDigit;

    /**
     * Bank account type
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * Metadata
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * Pix key
     * @required
     * @maps pix_key
     * @var string $pixKey public property
     */
    public $pixKey;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $holderName        Initialization value for $this->holderName
     * @param string $holderType        Initialization value for $this->holderType
     * @param string $holderDocument    Initialization value for $this->holderDocument
     * @param string $bank              Initialization value for $this->bank
     * @param string $branchNumber      Initialization value for $this->branchNumber
     * @param string $branchCheckDigit  Initialization value for $this->branchCheckDigit
     * @param string $accountNumber     Initialization value for $this->accountNumber
     * @param string $accountCheckDigit Initialization value for $this->accountCheckDigit
     * @param string $type              Initialization value for $this->type
     * @param array  $metadata          Initialization value for $this->metadata
     * @param string $pixKey            Initialization value for $this->pixKey
     */
    public function __construct()
    {
        if (11 == func_num_args()) {
            $this->holderName        = func_get_arg(0);
            $this->holderType        = func_get_arg(1);
            $this->holderDocument    = func_get_arg(2);
            $this->bank              = func_get_arg(3);
            $this->branchNumber      = func_get_arg(4);
            $this->branchCheckDigit  = func_get_arg(5);
            $this->accountNumber     = func_get_arg(6);
            $this->accountCheckDigit = func_get_arg(7);
            $this->type              = func_get_arg(8);
            $this->metadata          = func_get_arg(9);
            $this->pixKey            = func_get_arg(10);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['holder_name']         = $this->holderName;
        $json['holder_type']         = $this->holderType;
        $json['holder_document']     = $this->holderDocument;
        $json['bank']                = $this->bank;
        $json['branch_number']       = $this->branchNumber;
        $json['branch_check_digit']  = $this->branchCheckDigit;
        $json['account_number']      = $this->accountNumber;
        $json['account_check_digit'] = $this->accountCheckDigit;
        $json['type']                = $this->type;
        $json['metadata']            = $this->metadata;
        $json['pix_key']             = $this->pixKey;

        return $json;
    }
}
