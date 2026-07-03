<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientBasics.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\Accounting\Clients;

use Psr\Log\LoggerInterface;

/**
 * Mandant inkl. Buchführungs-Grunddaten (GET /clients/{client-id}).
 */
class ClientBasics extends Client {
    protected bool $is_document_management_available;

    protected BasicAccountingInformations $basic_accounting_information;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function isDocumentManagementAvailable(): bool {
        return $this->is_document_management_available ?? false;
    }

    public function getBasicAccountingInformation(): ?BasicAccountingInformations {
        return $this->basic_accounting_information ?? null;
    }
}
