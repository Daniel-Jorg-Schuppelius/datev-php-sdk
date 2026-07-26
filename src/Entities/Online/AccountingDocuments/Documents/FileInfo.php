<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FileInfo.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDocuments\Documents;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Datei-Metadaten eines hochgeladenen Belegs.
 */
class FileInfo extends NamedEntity {
    protected string $id;

    protected string $name;

    protected int $size;

    protected string $upload_date;

    protected string $media_type;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getName(): ?string {
        return $this->name ?? null;
    }

    public function getSize(): ?int {
        return $this->size ?? null;
    }

    public function getUploadDate(): ?string {
        return $this->upload_date ?? null;
    }

    public function getMediaType(): ?string {
        return $this->media_type ?? null;
    }
}
