<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Request for updating a customer
 */
class UpdateCustomerRequest implements JsonSerializable
{
    /**
     * Name
     * @var string|null $name public property
     */
    public $name;

    /**
     * Email
     * @var string|null $email public property
     */
    public $email;

    /**
     * Document number
     * @var string|null $document public property
     */
    public $document;

    /**
     * Person type
     * @var string|null $type public property
     */
    public $type;

    /**
     * Address
     * @var \BetaPayApiLib\Models\CreateAddressRequest|null $address public property
     */
    public $address;

    /**
     * Metadata
     * @var array|null $metadata public property
     */
    public $metadata;

    /**
     * @todo Write general description for this property
     * @var \BetaPayApiLib\Models\CreatePhonesRequest|null $phones public property
     */
    public $phones;

    /**
     * Código de referência do cliente no sistema da loja. Max: 52 caracteres
     * @var string|null $code public property
     */
    public $code;

    /**
     * Gênero do cliente
     * @var string|null $gender public property
     */
    public $gender;

    /**
     * @todo Write general description for this property
     * @maps document_type
     * @var string|null $documentType public property
     */
    public $documentType;

    /**
     * Constructor to set initial or default values of member properties
     * @param string               $name         Initialization value for $this->name
     * @param string               $email        Initialization value for $this->email
     * @param string               $document     Initialization value for $this->document
     * @param string               $type         Initialization value for $this->type
     * @param CreateAddressRequest $address      Initialization value for $this->address
     * @param array                $metadata     Initialization value for $this->metadata
     * @param CreatePhonesRequest  $phones       Initialization value for $this->phones
     * @param string               $code         Initialization value for $this->code
     * @param string               $gender       Initialization value for $this->gender
     * @param string               $documentType Initialization value for $this->documentType
     */
    public function __construct()
    {
        if (10 == func_num_args()) {
            $this->name         = func_get_arg(0);
            $this->email        = func_get_arg(1);
            $this->document     = func_get_arg(2);
            $this->type         = func_get_arg(3);
            $this->address      = func_get_arg(4);
            $this->metadata     = func_get_arg(5);
            $this->phones       = func_get_arg(6);
            $this->code         = func_get_arg(7);
            $this->gender       = func_get_arg(8);
            $this->documentType = func_get_arg(9);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['name']          = $this->name;
        $json['email']         = $this->email;
        $json['document']      = $this->document;
        $json['type']          = $this->type;
        $json['address']       = $this->address;
        $json['metadata']      = $this->metadata;
        $json['phones']        = $this->phones;
        $json['code']          = $this->code;
        $json['gender']        = $this->gender;
        $json['document_type'] = $this->documentType;

        return $json;
    }
}
