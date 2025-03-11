<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : RecordRead.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\RecordReads;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use APIToolkit\Enums\CurrencyCode;
use DateTime;
use Datev\Entities\Accounting\AdditionalInformations\AdditionalInformations;
use Datev\Entities\Accounting\AdvancePayments\AdvancePayment;
use Datev\Entities\Accounting\CostCenters\ID\CostCenterIDOne;
use Datev\Entities\Accounting\CostCenters\ID\CostCenterIDTwo;
use Datev\Entities\Accounting\OpenItems\OpenItem;
use Datev\Entities\Accounting\Sequences\SequenceID;
use Datev\Entities\Common\VAT\EuVatID;
use Datev\Entities\Common\VAT\EuVatID4CountryOfOrigin;
use Datev\Entities\DocumentManagement\Documents\DocumentID;
use Datev\Enums\AccountingReason;
use Datev\Enums\AccountingRecordType;
use Datev\Enums\CashDiscountType;
use Datev\Enums\DebitCredit;
use Datev\Enums\InspectionStatus;
use Datev\Enums\TaxationMethod;
use Psr\Log\LoggerInterface;

class RecordRead extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected RecordReadID $id;
    protected ?int $accounting_transaction_key;
    protected ?int $account_number;
    protected ?AdditionalInformations $additional_information;
    protected ?AdvancePayment $advance_payment;
    protected ?float $amount;
    protected ?int $assessment_year;
    protected ?DateTime $assigned_due_date;
    protected ?string $billing_reference;
    protected ?int $business_partner_bank_position;
    protected ?float $cash_discount;
    protected ?CashDiscountType $cash_discount_type;
    protected ?int $circumstance_type;
    protected ?int $contra_account_number;
    protected ?CurrencyCode $currency_code;
    protected ?DateTime $date;
    protected ?DebitCredit $debit_credit_identifier;
    protected ?DateTime $delivery_date;
    protected ?TaxationMethod $differing_taxation_method;
    protected ?string $document_field1;
    protected ?string $document_field2;
    protected ?DocumentID $document_link;
    protected DateTime $due_date;
    protected ?float $eu_tax_rate;
    protected ?float $eu_tax_rate_for_country_of_origin;
    protected ?EuVatID $eu_vat_id;
    protected ?EuVatID4CountryOfOrigin $eu_vat_id_for_country_of_origin;
    protected ?float $exchange_rate;
    protected ?bool $general_reversal;
    protected ?bool $has_cash_discount_block;
    protected ?bool $has_dunning_block;
    protected ?bool $has_interest_block;
    protected ?InspectionStatus $inspection_status;
    protected ?CostCenterIDOne $kost1_cost_center_id;
    protected ?CostCenterIDTwo $kost2_cost_center_id;
    protected DateTime $kost_date;

    protected ?float $kost_quantity;
    protected ?string $kost_unit_price;
    protected ?OpenItem $open_item_information;
    protected ?string $mark_of_origin;
    protected ?string $posting_description;
    protected ?AccountingRecordType $record_type;
    protected ?float $tax_rate;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): RecordReadID {
        return $this->id;
    }
}