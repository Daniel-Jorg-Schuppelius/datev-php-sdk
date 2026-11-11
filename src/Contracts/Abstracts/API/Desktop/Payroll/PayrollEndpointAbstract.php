<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PayrollEndpointAbstract.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Contracts\Abstracts\API\Desktop\Payroll;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use APIToolkit\Entities\ID;
use DateTimeImmutable;
use DateTimeInterface;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Common\Clients\ClientID;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

abstract class PayrollEndpointAbstract extends EndpointAbstract {
    protected string $endpointPrefix = 'hr/v3';
    protected string $endpoint = 'clients/{client-id}';

    protected ClientID $clientID;
    protected ?DateTimeInterface $referenceDate = null;

    public function __construct(ApiClientInterface $client, ?LoggerInterface $logger = null, ClientID $clientID = new ClientID) {
        parent::__construct($client, $logger);
        $this->clientID = $clientID;
    }

    public function get(?ID $id = null): ?NamedEntityInterface {
        return null;
    }

    public function getClientID(): ClientID {
        return $this->clientID;
    }

    public function setClientID(ClientID $clientID): void {
        $this->clientID = $clientID;
    }

    /**
     * Stichtag für alle Abfragen dieses Endpunkts; ohne Angabe gilt der heutige Tag.
     */
    public function setReferenceDate(?DateTimeInterface $referenceDate): void {
        $this->referenceDate = $referenceDate;
    }

    /**
     * Laut Spec verlangt jeder GET der Lohn-API reference-date (yyyy-mm-dd).
     *
     * @param array<string, mixed> $queryParams
     * @param array<string, mixed> $options
     */
    protected function getContents(array $queryParams = [], array $options = [], ?string $urlPath = null, int|array $statusCode = 200): string {
        $referenceDate = $queryParams['reference-date'] ?? $this->referenceDate ?? new DateTimeImmutable;

        if ($referenceDate instanceof DateTimeInterface) {
            $referenceDate = $referenceDate->format('Y-m-d');
        }

        if (!is_string($referenceDate) || preg_match('/^\d{4}-\d{2}-\d{2}$/', $referenceDate) !== 1) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'reference-date must be in the format yyyy-mm-dd');
        }

        $queryParams['reference-date'] = $referenceDate;

        return parent::getContents($queryParams, $options, $urlPath, $statusCode);
    }

    protected function getEndpointUrl(): string {
        $url = parent::getEndpointUrl();
        $url = str_replace('{client-id}', $this->clientID->toString(), $url);
        return rtrim($url, '/');
    }
}
