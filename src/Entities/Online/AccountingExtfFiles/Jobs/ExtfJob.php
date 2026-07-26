<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExtfJob.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingExtfFiles\Jobs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\Online\ExtfJobResult;
use Psr\Log\LoggerInterface;

/**
 * EXTF-Import-Job (accounting:extf-files v3).
 */
class ExtfJob extends NamedEntity {
    protected string $id;

    protected string $filename;

    protected string $fiscal_year_begin;

    protected string $client_application_display_name;

    protected string $client_application_vendor;

    protected string $client_application_version;

    protected int $data_category_id;

    protected string $date_from;

    protected string $date_to;

    protected string $label;

    protected int $number_of_accounting_records;

    protected string $reference_id;

    protected ExtfJobResult $result;

    protected string $timestamp;

    protected ValidationDetails $validation_details;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getFilename(): ?string {
        return $this->filename ?? null;
    }

    public function getFiscalYearBegin(): ?string {
        return $this->fiscal_year_begin ?? null;
    }

    public function getClientApplicationDisplayName(): ?string {
        return $this->client_application_display_name ?? null;
    }

    public function getClientApplicationVendor(): ?string {
        return $this->client_application_vendor ?? null;
    }

    public function getClientApplicationVersion(): ?string {
        return $this->client_application_version ?? null;
    }

    public function getDataCategoryId(): ?int {
        return $this->data_category_id ?? null;
    }

    public function getDateFrom(): ?string {
        return $this->date_from ?? null;
    }

    public function getDateTo(): ?string {
        return $this->date_to ?? null;
    }

    public function getLabel(): ?string {
        return $this->label ?? null;
    }

    public function getNumberOfAccountingRecords(): ?int {
        return $this->number_of_accounting_records ?? null;
    }

    public function getReferenceId(): ?string {
        return $this->reference_id ?? null;
    }

    public function getResult(): ?ExtfJobResult {
        return $this->result ?? null;
    }

    public function getTimestamp(): ?string {
        return $this->timestamp ?? null;
    }

    public function getValidationDetails(): ?ValidationDetails {
        return $this->validation_details ?? null;
    }
}
