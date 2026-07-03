<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDocuments\DocumentTypes;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\Online\{DebitCreditIdentifier, DocumentCategory};
use Psr\Log\LoggerInterface;

/**
 * Belegtyp des Mandanten in accounting:documents.
 */
class DocumentType extends NamedEntity {
    protected string $name;

    protected DocumentCategory $category;

    protected DebitCreditIdentifier $debit_credit_identifier;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getCategory(): ?DocumentCategory {
        return $this->category ?? null;
    }

    public function getDebitCreditIdentifier(): ?DebitCreditIdentifier {
        return $this->debit_credit_identifier ?? null;
    }
}
