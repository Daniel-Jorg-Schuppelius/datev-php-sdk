<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeScopedEndpointAbstract.php
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
 * /clients/{client-id}/employees/{personnel-number} (z. B. hr:eau, hr:exports).
 */
abstract class EmployeeScopedEndpointAbstract extends ClientScopedEndpointAbstract {
    protected string $endpoint = 'clients/{client-id}/employees/{personnel-number}';

    protected NamedValueInterface|Stringable|string $personnelNumber;

    public function __construct(ApiClientInterface $client, NamedValueInterface|Stringable|string $clientId = '', NamedValueInterface|Stringable|string $personnelNumber = '', ?LoggerInterface $logger = null) {
        parent::__construct($client, $clientId, $logger);
        $this->personnelNumber = $personnelNumber;
    }

    public function getPersonnelNumber(): NamedValueInterface|Stringable|string {
        return $this->personnelNumber;
    }

    public function setPersonnelNumber(NamedValueInterface|Stringable|string $personnelNumber): void {
        $this->personnelNumber = $personnelNumber;
    }

    protected function getEndpointUrl(): string {
        $personnelNumber = self::idToString($this->personnelNumber);

        if ($personnelNumber === '') {
            self::logErrorAndThrow(InvalidArgumentException::class, 'Personnel number is required (Class: ' . static::class . ')');
        }

        return str_replace('{personnel-number}', rawurlencode($personnelNumber), parent::getEndpointUrl());
    }
}
