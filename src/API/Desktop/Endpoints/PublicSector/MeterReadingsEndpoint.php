<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : MeterReadingsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\MeterReadings\MeterReading;
use Datev\Entities\PublicSector\MeterReadings\MeterReadings;
use InvalidArgumentException;

class MeterReadingsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'public-sector/v1';
    protected string $endpoint = 'clients';

    protected GUID $clientId;
    protected GUID $citizenId;
    protected int $feeId;
    protected string $meterId;

    public function setClientId(GUID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setCitizenId(GUID $citizenId): void {
        $this->citizenId = $citizenId;
    }

    public function setFeeId(int $feeId): void {
        $this->feeId = $feeId;
    }

    public function setMeterId(string $meterId): void {
        $this->meterId = $meterId;
    }

    public function get(?ID $id = null): ?MeterReading {
        return $this->getById($id?->toString());
    }

    public function getById(?string $meterReadingId = null): ?MeterReading {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId) || !isset($this->meterId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID, Citizen ID, Fee ID and Meter ID are required');
        }

        if (is_null($meterReadingId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Meter Reading ID is required');
        }

        return $this->logDebugWithTimer(function () use ($meterReadingId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/meters/{$this->meterId}/meterreadings/{$meterReadingId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return MeterReading::fromJson($response, self::$logger);
        }, "Fetching MeterReading (ID: {$meterReadingId})");
    }

    public function search(array $queryParams = [], array $options = []): ?MeterReadings {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId) || !isset($this->meterId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID, Citizen ID, Fee ID and Meter ID are required');
        }

        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/meters/{$this->meterId}/meterreadings");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return MeterReadings::fromJson($response, self::$logger);
        }, "Searching MeterReadings");
    }

    public function create(MeterReading $meterReading): bool {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId) || !isset($this->meterId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID, Citizen ID, Fee ID and Meter ID are required');
        }

        return $this->logDebugWithTimer(function () use ($meterReading) {
            $response = parent::postContents($meterReading->toArray(), [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/meters/{$this->meterId}/meterreadings");

            return $response !== false;
        }, "Creating MeterReading");
    }
}
