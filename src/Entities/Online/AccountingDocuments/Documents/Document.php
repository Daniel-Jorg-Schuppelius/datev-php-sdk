<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Document.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDocuments\Documents;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Beleg in accounting:documents (Antwort eines Uploads).
 */
class Document extends NamedEntity {
    protected string $id;

    protected FileInfos $files;

    protected string $document_type;

    protected string $note;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getFiles(): ?FileInfos {
        return $this->files ?? null;
    }

    public function getDocumentType(): ?string {
        return $this->document_type ?? null;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }
}
