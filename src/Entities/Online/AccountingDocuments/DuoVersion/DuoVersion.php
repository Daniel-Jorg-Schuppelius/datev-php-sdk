<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DuoVersion.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDocuments\DuoVersion;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * DATEV-Unternehmen-online-Version des Mandanten: erlaubte Dateiendungen
 * für Einzel- und Staple-Uploads.
 */
class DuoVersion extends NamedEntity {
    /** @var array<int, string> */
    protected array $allowed_file_extensions;

    /** @var array<int, string> */
    protected array $allowed_staple_file_extensions;

    protected string $staple_logic;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    /**
     * @return array<int, string>
     */
    public function getAllowedFileExtensions(): array {
        return $this->allowed_file_extensions ?? [];
    }

    /**
     * @return array<int, string>
     */
    public function getAllowedStapleFileExtensions(): array {
        return $this->allowed_staple_file_extensions ?? [];
    }

    public function getStapleLogic(): ?string {
        return $this->staple_logic ?? null;
    }
}
