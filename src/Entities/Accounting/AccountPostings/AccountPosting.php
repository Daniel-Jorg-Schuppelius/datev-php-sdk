<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountPosting.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AccountPostings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use CommonToolkit\Enums\CurrencyCode;
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
use Datev\Enums\TaxationMethod;
use Psr\Log\LoggerInterface;

class AccountPosting extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected AccountPostingID $id;
    protected ?int $account_number;
    protected ?AccountingReason $accounting_reason;
    protected ?SequenceID $accounting_sequence_id;
    protected ?int $accounting_transaction_key;
    protected ?int $accounting_transaction_key49_additional_function;
    protected ?int $accounting_transaction_key49_main_function_number;
    protected ?int $accounting_transaction_key49_main_function_type;
    protected ?int $additional_functions_for_goods_and_services;
    protected ?AdditionalInformations $additional_information;
    protected ?float $amount_creadit;
    protected ?float $amount_debit;
    protected ?float $amount_entered;
    protected ?AdvancePayment $advance_payment;
    protected ?string $billing_reference;
    protected ?CashDiscountType $cash_discount_type;
    protected ?int $cases_related_to_goods_and_services;
    protected ?int $contra_account_number;
    protected ?CurrencyCode $currency_code;
    protected ?CurrencyCode $currency_code_of_base_transaction_amount;
    protected ?DateTime $date;
    protected ?DateTime $date_assigned_tax_period;
    protected ?DateTime $delivery_date;
    protected ?TaxationMethod $differing_taxation_method;
    protected ?string $document_field1;
    protected ?string $document_field2;
    protected ?DocumentID $document_link;
    protected ?float $eu_tax_rate;
    protected ?float $eu_tax_rate_for_country_of_origin;
    protected ?EuVatID $eu_vat_id;
    protected ?EuVatID4CountryOfOrigin $eu_vat_id_for_country_of_origin;
    protected ?float $exchange_rate;
    protected ?bool $general_reversal;
    protected ?bool $is_opening_balance_posting;
    protected ?float $kost_quantity;
    protected ?CostCenterIDOne $kost1_cost_center_id;
    protected ?CostCenterIDTwo $kost2_cost_center_id;
    protected ?OpenItem $open_item_information;
    protected ?string $mark_of_origin;
    protected ?string $posting_description;
    protected ?AccountingRecordType $record_type;
    protected ?float $tax_rate;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): AccountPostingID {
        return $this->id;
    }
}