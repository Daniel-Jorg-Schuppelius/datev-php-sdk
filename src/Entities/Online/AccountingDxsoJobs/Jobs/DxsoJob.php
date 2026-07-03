<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DxsoJob.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDxsoJobs\Jobs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Angelegter DXSO-Job (Datentransfer nach Belege online).
 */
class DxsoJob extends NamedEntity {
    protected string $id;

    protected int $account_length;

    /** @var array<int, string> */
    protected array $cash_ledger_names;

    /** @var array<int, string> */
    protected array $ledger_folder_names;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getAccountLength(): ?int {
        return $this->account_length ?? null;
    }

    /**
     * @return array<int, string>
     */
    public function getCashLedgerNames(): array {
        return $this->cash_ledger_names ?? [];
    }

    /**
     * @return array<int, string>
     */
    public function getLedgerFolderNames(): array {
        return $this->ledger_folder_names ?? [];
    }
}
