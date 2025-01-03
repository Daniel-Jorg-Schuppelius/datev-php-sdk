<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Record.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\Records;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Enums\CurrencyCode;
use DateTime;
use Datev\Entities\Accounting\AdditionalInformations\AdditionalInformation;
use Datev\Entities\Accounting\AdvancePayments\AdvancePayment;
use Datev\Entities\Common\VAT\EuVatID;
use Datev\Entities\Common\VAT\EuVatID4CountryOfOrigin;
use Datev\Entities\DocumentManagement\Documents\DocumentID;
use Datev\Enums\BVVPosition;
use Datev\Enums\CashDiscountType;
use Datev\Enums\DebitCredit;
use Datev\Enums\TaxationMethod;
use Psr\Log\LoggerInterface;

class Record extends NamedEntity {
    protected ?int $accounting_transaction_key;
    protected ?int $accounting_transaction_key49_additional_function;
    protected ?int $accounting_transaction_key49_main_function_number;
    protected ?int $accounting_transaction_key49_main_function_type;
    protected ?int $account_number;
    protected ?int $additional_functions_for_goods_and_services;
    protected ?AdditionalInformation $additional_information;
    protected ?AdvancePayment $advance_payment;
    protected ?float $amount;
    protected ?int $assessment_year;
    protected ?DateTime $assigned_due_date;
    protected ?int $business_partner_bank_position;
    protected ?BVVPosition $bvv_position;
    protected ?int $cases_related_to_goods_and_services;
    protected ?float $cash_discount;
    protected ?CashDiscountType $cash_discount_type;
    protected ?int $circumstance_type;
    protected ?int $contra_account_number;
    protected ?CurrencyCode $currency_code;
    protected ?DateTime $date;
    protected DebitCredit $debit_credit;
    protected ?DateTime $delivery_date;
    protected ?TaxationMethod $differing_taxation_method;
    protected ?string $document_field1;
    protected ?string $document_field2;
    protected ?DocumentID $document_link;
    protected ?string $document_system;
    protected ?float $eu_tax_rate;
    protected ?float $eu_tax_rate_for_country_of_origin;
    protected ?EuVatID $eu_vat_id;
    protected ?EuVatID4CountryOfOrigin $eu_vat_id_for_country_of_origin;
    protected ?float $exchange_rate;
    protected ?bool $general_reversal;
    protected ?bool $has_cash_discount_block;
    protected ?bool $has_dunning_block;
    protected ?bool $has_interest_block;




    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
