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
 *Recipient response
 */
class GetRecipientResponse implements JsonSerializable
{
    /**
     * Id
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * Name
     * @required
     * @var string $name public property
     */
    public $name;

    /**
     * Email
     * @required
     * @var string $email public property
     */
    public $email;

    /**
     * Document
     * @required
     * @var string $document public property
     */
    public $document;

    /**
     * Description
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * Type
     * @required
     * @var string $type public property
     */
    public $type;

    /**
     * Status
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * Creation date
     * @required
     * @maps created_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $createdAt public property
     */
    public $createdAt;

    /**
     * Last update date
     * @required
     * @maps updated_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $updatedAt public property
     */
    public $updatedAt;

    /**
     * Deletion date
     * @required
     * @maps deleted_at
     * @factory \BetaPayApiLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime $deletedAt public property
     */
    public $deletedAt;

    /**
     * Default bank account
     * @required
     * @maps default_bank_account
     * @var \BetaPayApiLib\Models\GetBankAccountResponse $defaultBankAccount public property
     */
    public $defaultBankAccount;

    /**
     * Info about the recipient on the gateway
     * @required
     * @maps gateway_recipients
     * @var \BetaPayApiLib\Models\GetGatewayRecipientResponse[] $gatewayRecipients public property
     */
    public $gatewayRecipients;

    /**
     * Metadata
     * @required
     * @var array $metadata public property
     */
    public $metadata;

    /**
     * @todo Write general description for this property
     * @maps automatic_anticipation_settings
     * @var \BetaPayApiLib\Models\GetAutomaticAnticipationResponse|null $automaticAnticipationSettings public property
     */
    public $automaticAnticipationSettings;

    /**
     * @todo Write general description for this property
     * @maps transfer_settings
     * @var \BetaPayApiLib\Models\GetTransferSettingsResponse|null $transferSettings public property
     */
    public $transferSettings;

    /**
     * Recipient code
     * @required
     * @var string $code public property
     */
    public $code;

    /**
     * Payment mode
     * @required
     * @maps payment_mode
     * @var string $paymentMode public property
     */
    public $paymentMode;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                            $id                            Initialization value for $this->id
     * @param string                            $name                          Initialization value for $this->name
     * @param string                            $email                         Initialization value for $this->email
     * @param string                            $document                      Initialization value for $this-
     *                                                                           >document
     * @param string                            $description                   Initialization value for $this-
     *                                                                           >description
     * @param string                            $type                          Initialization value for $this->type
     * @param string                            $status                        Initialization value for $this->status
     * @param \DateTime                         $createdAt                     Initialization value for $this-
     *                                                                           >createdAt
     * @param \DateTime                         $updatedAt                     Initialization value for $this-
     *                                                                           >updatedAt
     * @param \DateTime                         $deletedAt                     Initialization value for $this-
     *                                                                           >deletedAt
     * @param GetBankAccountResponse            $defaultBankAccount            Initialization value for $this-
     *                                                                           >defaultBankAccount
     * @param array                             $gatewayRecipients             Initialization value for $this-
     *                                                                           >gatewayRecipients
     * @param array                             $metadata                      Initialization value for $this-
     *                                                                           >metadata
     * @param GetAutomaticAnticipationResponse  $automaticAnticipationSettings Initialization value for $this-
     *                                                                           >automaticAnticipationSettings
     * @param GetTransferSettingsResponse       $transferSettings              Initialization value for $this-
     *                                                                           >transferSettings
     * @param string                            $code                          Initialization value for $this->code
     * @param string                            $paymentMode                   Initialization value for $this-
     *                                                                           >paymentMode
     */
    public function __construct()
    {
        switch (func_num_args()) {
            case 17:
                $this->id                            = func_get_arg(0);
                $this->name                          = func_get_arg(1);
                $this->email                         = func_get_arg(2);
                $this->document                      = func_get_arg(3);
                $this->description                   = func_get_arg(4);
                $this->type                          = func_get_arg(5);
                $this->status                        = func_get_arg(6);
                $this->createdAt                     = func_get_arg(7);
                $this->updatedAt                     = func_get_arg(8);
                $this->deletedAt                     = func_get_arg(9);
                $this->defaultBankAccount            = func_get_arg(10);
                $this->gatewayRecipients             = func_get_arg(11);
                $this->metadata                      = func_get_arg(12);
                $this->automaticAnticipationSettings = func_get_arg(13);
                $this->transferSettings              = func_get_arg(14);
                $this->code                          = func_get_arg(15);
                $this->paymentMode                   = func_get_arg(16);
                break;

            default:
                $this->paymentMode = 'bank_transfer';
                break;
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize() : mixed
    {
        $json = array();
        $json['id']                              = $this->id;
        $json['name']                            = $this->name;
        $json['email']                           = $this->email;
        $json['document']                        = $this->document;
        $json['description']                     = $this->description;
        $json['type']                            = $this->type;
        $json['status']                          = $this->status;
        $json['created_at']                      = DateTimeHelper::toRfc3339DateTime($this->createdAt);
        $json['updated_at']                      = DateTimeHelper::toRfc3339DateTime($this->updatedAt);
        $json['deleted_at']                      = DateTimeHelper::toRfc3339DateTime($this->deletedAt);
        $json['default_bank_account']            = $this->defaultBankAccount;
        $json['gateway_recipients']              = $this->gatewayRecipients;
        $json['metadata']                        = $this->metadata;
        $json['automatic_anticipation_settings'] = $this->automaticAnticipationSettings;
        $json['transfer_settings']               = $this->transferSettings;
        $json['code']                            = $this->code;
        $json['payment_mode']                    = $this->paymentMode;

        return $json;
    }
}
