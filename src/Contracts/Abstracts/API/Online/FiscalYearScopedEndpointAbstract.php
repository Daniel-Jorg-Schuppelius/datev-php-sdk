<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FiscalYearScopedEndpointAbstract.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Online;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use APIToolkit\Contracts\Interfaces\NamedValueInterface;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Stringable;

/**
 * Basisklasse für Online-Endpoints unterhalb von
 * /clients/{client-id}/fiscal-years/{fiscal-year-id} (Accounting Data Exchange).
 */
abstract class FiscalYearScopedEndpointAbstract extends ClientScopedEndpointAbstract {
    protected string $endpoint = 'clients/{client-id}/fiscal-years/{fiscal-year-id}';

    protected NamedValueInterface|Stringable|string $fiscalYearId;

    public function __construct(ApiClientInterface $client, NamedValueInterface|Stringable|string $clientId = '', NamedValueInterface|Stringable|string $fiscalYearId = '', ?LoggerInterface $logger = null) {
        parent::__construct($client, $clientId, $logger);
        $this->fiscalYearId = $fiscalYearId;
    }

    public function getFiscalYearId(): NamedValueInterface|Stringable|string {
        return $this->fiscalYearId;
    }

    public function setFiscalYearId(NamedValueInterface|Stringable|string $fiscalYearId): void {
        $this->fiscalYearId = $fiscalYearId;
    }

    protected function getEndpointUrl(): string {
        $fiscalYearId = self::idToString($this->fiscalYearId);

        if ($fiscalYearId === '') {
            self::logErrorAndThrow(InvalidArgumentException::class, 'Fiscal-Year-ID is required (Class: ' . static::class . ')');
        }

        return str_replace('{fiscal-year-id}', rawurlencode($fiscalYearId), parent::getEndpointUrl());
    }
}
