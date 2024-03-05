<?php
/*
 * BetaPayApiLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BetaPayApiLib\Models;

use JsonSerializable;

/**
 *Response object for listing invoices
 */
class ListInvoicesResponse implements JsonSerializable
{
    /**
     * The Invoice objects
     * @required
     * @var \BetaPayApiLib\Models\GetInvoiceResponse[] $data public property
     */
    public $data;

    /**
     * Paging object
     * @required
     * @var \BetaPayApiLib\Models\PagingResponse $paging public property
     */
    public $paging;

    /**
     * Constructor to set initial or default values of member properties
     * @param array          $data   Initialization value for $this->data
     * @param PagingResponse $paging Initialization value for $this->paging
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->data   = func_get_arg(0);
            $this->paging = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['data']   = $this->data;
        $json['paging'] = $this->paging;

        return $json;
    }
}
