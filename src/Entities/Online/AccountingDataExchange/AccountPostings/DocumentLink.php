<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentLink.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\AccountPostings;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Verknüpfung einer Buchung mit einem Beleg (z. B. in Belege online).
 */
class DocumentLink extends NamedEntity {
    protected string $sourceSystem;

    protected string $documentGuid;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getSourceSystem(): ?string {
        return $this->sourceSystem ?? null;
    }

    public function getDocumentGuid(): ?string {
        return $this->documentGuid ?? null;
    }
}
