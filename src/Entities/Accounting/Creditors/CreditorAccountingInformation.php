<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CreditorAccountingInformation.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\Creditors;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Entities\Accounting\BusinessPartners\IndividualFields;
use Psr\Log\LoggerInterface;

class CreditorAccountingInformation extends NamedEntity {
    protected ?string $alternative_contact_person;
    protected ?string $clerk;
    protected ?int $client_bank_position;
    protected ?string $contact_person;
    protected ?string $currency_management;
    protected ?bool $is_insolvent;
    protected ?bool $is_various_account;
    protected ?string $language;
    protected ?string $output_destination;
    protected ?string $payment_medium;
    protected ?string $tax_number;
    protected ?DateTime $temp_payment_block;
    protected ?int $term_of_payment_id;
    protected ?IndividualFields $individual_fields;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getAlternativeContactPerson(): ?string {
        return $this->alternative_contact_person ?? null;
    }

    public function getClerk(): ?string {
        return $this->clerk ?? null;
    }

    public function getClientBankPosition(): ?int {
        return $this->client_bank_position ?? null;
    }

    public function getContactPerson(): ?string {
        return $this->contact_person ?? null;
    }

    public function getCurrencyManagement(): ?string {
        return $this->currency_management ?? null;
    }

    public function isInsolvent(): ?bool {
        return $this->is_insolvent ?? null;
    }

    public function isVariousAccount(): ?bool {
        return $this->is_various_account ?? null;
    }

    public function getLanguage(): ?string {
        return $this->language ?? null;
    }

    public function getOutputDestination(): ?string {
        return $this->output_destination ?? null;
    }

    public function getPaymentMedium(): ?string {
        return $this->payment_medium ?? null;
    }

    public function getTaxNumber(): ?string {
        return $this->tax_number ?? null;
    }

    public function getTempPaymentBlock(): ?DateTime {
        return $this->temp_payment_block ?? null;
    }

    public function getTermOfPaymentId(): ?int {
        return $this->term_of_payment_id ?? null;
    }

    public function getIndividualFields(): ?IndividualFields {
        return $this->individual_fields ?? null;
    }
}
