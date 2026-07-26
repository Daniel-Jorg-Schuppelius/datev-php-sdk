<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DxsoJobStatus.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDxsoJobs\Jobs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\Online\DxsoJobStatusCode;
use Psr\Log\LoggerInterface;

/**
 * Verarbeitungsstatus eines DXSO-Jobs.
 */
class DxsoJobStatus extends NamedEntity {
    protected string $id;

    protected DxsoJobStatusCode $status;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getStatus(): ?DxsoJobStatusCode {
        return $this->status ?? null;
    }
}
