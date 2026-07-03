<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TenantScopedEndpointAbstract.php
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
 * Basisklasse für Online-Endpoints unterhalb von /tenants/{tenant-id}
 * (cashregister:import adressiert Bestände über Tenants statt Clients).
 */
abstract class TenantScopedEndpointAbstract extends EndpointAbstract {
    protected string $endpoint = 'tenants/{tenant-id}';

    protected NamedValueInterface|Stringable|string $tenantId;

    public function __construct(ApiClientInterface $client, NamedValueInterface|Stringable|string $tenantId = '', ?LoggerInterface $logger = null) {
        parent::__construct($client, $logger);
        $this->tenantId = $tenantId;
    }

    public function getTenantId(): NamedValueInterface|Stringable|string {
        return $this->tenantId;
    }

    public function setTenantId(NamedValueInterface|Stringable|string $tenantId): void {
        $this->tenantId = $tenantId;
    }

    /**
     * Normalisiert eine ID (NamedValue, Stringable oder string) auf ihren Stringwert.
     */
    protected static function idToString(NamedValueInterface|Stringable|string $id): string {
        if ($id instanceof NamedValueInterface) {
            return (string) $id->getValue();
        }

        return (string) $id;
    }

    protected function getEndpointUrl(): string {
        $tenantId = self::idToString($this->tenantId);

        if ($tenantId === '') {
            self::logErrorAndThrow(InvalidArgumentException::class, 'Tenant-ID is required (Class: ' . static::class . ')');
        }

        $url = str_replace('{tenant-id}', rawurlencode($tenantId), parent::getEndpointUrl());

        return rtrim($url, '/');
    }
}
