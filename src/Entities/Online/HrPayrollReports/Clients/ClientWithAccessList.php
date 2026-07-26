<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientWithAccessList.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrPayrollReports\Clients;

use Psr\Log\LoggerInterface;

/**
 * Mandant inkl. Zugriffsliste auf Dokumenttypen (GET /clients/{client-id}).
 */
class ClientWithAccessList extends Client {
    protected DocumentTypesAccess $document_types;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getDocumentTypes(): ?DocumentTypesAccess {
        return $this->document_types ?? null;
    }
}
