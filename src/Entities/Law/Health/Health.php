<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Health.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\Health;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Psr\Log\LoggerInterface;

class Health extends NamedEntity {
    protected ?string $status;
    protected ?string $version;
    protected ?string $id;
    protected ?DateTime $start_time;
    protected ?int $process_id;
    /** @var array<int, mixed>|null */
    protected ?array $individual_checks;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getStatus(): ?string {
        return $this->status ?? null;
    }

    public function getVersion(): ?string {
        return $this->version ?? null;
    }

    public function isHealthy(): bool {
        return isset($this->status) && strtolower($this->status) === 'ok';
    }

    public function getId(): ?string {
        return $this->id ?? null;
    }

    public function getStartTime(): ?DateTime {
        return $this->start_time ?? null;
    }

    public function getProcessId(): ?int {
        return $this->process_id ?? null;
    }

    /**
     * @return array<int, mixed>|null
     */
    public function getIndividualChecks(): ?array {
        return $this->individual_checks ?? null;
    }
}
