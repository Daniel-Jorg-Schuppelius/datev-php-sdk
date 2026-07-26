<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobResult.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrExchange\Jobs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\Online\HrExchange\Errors\ExchangeErrors;
use Psr\Log\LoggerInterface;

/**
 * Ergebnis eines Lese-Jobs; exchangeObjects enthält die Rohdaten des angefragten Ressourcentyps.
 */
class JobResult extends NamedEntity {
    protected string $httpStatus;

    /** @var array<int, mixed> */
    protected array $exchangeObjects;

    protected ExchangeErrors $errors;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getHttpStatus(): ?string {
        return $this->httpStatus ?? null;
    }

    /**
     * @return array<int, mixed>
     */
    public function getExchangeObjects(): array {
        return $this->exchangeObjects ?? [];
    }

    public function getErrors(): ?ExchangeErrors {
        return $this->errors ?? null;
    }
}
