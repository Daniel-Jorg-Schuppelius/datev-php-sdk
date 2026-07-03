<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientScopedEndpointAbstract.php
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
 * Basisklasse für Online-Endpoints unterhalb von /clients/{client-id}.
 *
 * Die client-id ist je nach Dienst eine GUID (ClientID) oder die
 * Verbundnummer "Beraternummer-Mandantennummer" (ConsultantClientNumber);
 * der konkrete Endpoint dokumentiert die erwartete Form.
 */
abstract class ClientScopedEndpointAbstract extends EndpointAbstract {
    protected string $endpoint = 'clients/{client-id}';

    protected NamedValueInterface|Stringable|string $clientId;

    public function __construct(ApiClientInterface $client, NamedValueInterface|Stringable|string $clientId = '', ?LoggerInterface $logger = null) {
        parent::__construct($client, $logger);
        $this->clientId = $clientId;
    }

    public function getClientId(): NamedValueInterface|Stringable|string {
        return $this->clientId;
    }

    public function setClientId(NamedValueInterface|Stringable|string $clientId): void {
        $this->clientId = $clientId;
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
        $clientId = self::idToString($this->clientId);

        if ($clientId === '') {
            self::logErrorAndThrow(InvalidArgumentException::class, 'Client-ID is required (Class: ' . static::class . ')');
        }

        $url = str_replace('{client-id}', rawurlencode($clientId), parent::getEndpointUrl());

        return rtrim($url, '/');
    }
}
