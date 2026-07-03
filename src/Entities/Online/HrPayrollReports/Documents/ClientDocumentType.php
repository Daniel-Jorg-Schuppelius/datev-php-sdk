<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientDocumentType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrPayrollReports\Documents;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Mandanten-Auswertungen eines Dokumenttyps.
 */
class ClientDocumentType extends NamedEntity {
    protected string $document_type;

    protected MetadataEntries $document;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getDocumentType(): ?string {
        return $this->document_type ?? null;
    }

    public function getDocument(): ?MetadataEntries {
        return $this->document ?? null;
    }
}
