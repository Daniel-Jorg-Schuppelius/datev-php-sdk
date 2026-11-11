<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BaseAccountOpenItem.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\OpenItems;

use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use CommonToolkit\Enums\CurrencyCode;
use DateTime;
use Datev\Entities\Accounting\AdditionalInformations\AdditionalInformations;
use Datev\Entities\Accounting\CostCenters\ID\{CostCenterIDOne, CostCenterIDTwo};
use Datev\Enums\{DebitCredit, EvidenceType};
use Psr\Log\LoggerInterface;

/**
 * Gemeinsame Felder der Personenkonten-Posten aus /accounts-receivable und
 * /accounts-payable. Erbt von OpenItem, damit bisherige Typangaben der
 * Endpunkte gültig bleiben.
 */
abstract class BaseAccountOpenItem extends OpenItem implements IdentifiableNamedEntityInterface {
    protected ?OpenItemID $id;
    protected ?string $accounting_sequence_id;
    protected ?int $account_number;
    protected ?AdditionalInformations $additional_information;
    protected ?float $amount_debit;
    protected ?float $amount_credit;
    protected ?float $amount_entered;
    protected ?int $client_bank_position;
    protected ?int $contra_account_number;
    protected ?CurrencyCode $currency_code;
    protected ?DateTime $date;
    protected ?DebitCredit $debit_credit_identifier;
    protected ?string $document_field1;
    protected ?string $document_field2;
    // Kein GUID: der Beleglink kommt als Text wie 'BEDI "<GUID>"'.
    protected ?string $document_link;
    protected ?int $due_days;
    protected ?EvidenceType $evidence_type;
    protected ?float $exchange_rate;
    protected ?bool $is_cleared;
    protected ?bool $is_condensed;
    protected ?CostCenterIDOne $kost1_cost_center_id;
    protected ?CostCenterIDTwo $kost2_cost_center_id;
    protected ?float $kost_quantity;
    protected ?string $minor_difference;
    protected ?float $open_balance_of_item;
    protected ?string $open_item_indicator;
    protected ?string $open_item_number;
    protected ?string $payment_indicator;
    protected ?string $posting_description;
    protected ?int $posting_record_number;
    protected ?string $receivables_type_id;
    protected ?float $tax_rate;
    protected ?DateTime $temp_dunning_block;
    protected ?int $term_of_payment_id;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?OpenItemID {
        return $this->id ?? null;
    }
}
