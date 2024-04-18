<?php
/*
 * BspagApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BspagApiLib\Exceptions;

use BspagApiLib\APIException;
use BspagApiLib\APIHelper;

/**
 * Api Error Exception
 */
class ErrorException extends APIException
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $message public property
     */
    public $message;

    /**
     * @todo Write general description for this property
     * @required
     * @var object $errors public property
     */
    public $errors;

    /**
     * @todo Write general description for this property
     * @required
     * @var object $request public property
     */
    public $request;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct($reason, $context)
    {
        parent::__construct($reason, $context);
    }

    /**
     * Unbox response into this exception class
     */
    public function unbox()
    {
        APIHelper::deserialize(self::getResponseBody(), $this, false, false);
    }
}
