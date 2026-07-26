<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentsMetadata.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrPayrollReports\Documents;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Metadaten der verfügbaren Auswertungsdokumente (GET documents-metadata).
 */
class DocumentsMetadata extends NamedEntity {
    protected EmployeeDocumentTypes $employee_documents;

    protected ClientDocumentTypes $client_documents;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getEmployeeDocuments(): ?EmployeeDocumentTypes {
        return $this->employee_documents ?? null;
    }

    public function getClientDocuments(): ?ClientDocumentTypes {
        return $this->client_documents ?? null;
    }
}
