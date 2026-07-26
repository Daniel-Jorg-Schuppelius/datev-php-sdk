<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdditionalError.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Errors;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Zusatzinformation zu einem Fehler.
 */
class AdditionalError extends NamedEntity {
    protected string $id;

    protected string $severity;

    protected string $description;

    protected string $help_uri;

    protected string $path;

    /** @var array<int, string> */
    protected array $affected_fields;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getSeverity(): ?string {
        return $this->severity ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getHelpUri(): ?string {
        return $this->help_uri ?? null;
    }

    public function getPath(): ?string {
        return $this->path ?? null;
    }

    /**
     * @return array<int, string>
     */
    public function getAffectedFields(): array {
        return $this->affected_fields ?? [];
    }
}
