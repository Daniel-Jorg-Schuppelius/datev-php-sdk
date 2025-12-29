<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionMeterReadingsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\TransactionMeterReadings\TransactionMeterReading;
use Datev\Entities\PublicSector\TransactionMeterReadings\TransactionMeterReadings;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

class TransactionMeterReadingsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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

    public function get(?ID $id = null): ?TransactionMeterReading {
        if (is_null($id)) {
            return null;
        }
        return $this->getById((int) $id->toString());
    }

    public function getById(?int $transactionId = null): ?TransactionMeterReading {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId) || !isset($this->meterId)) {
            $this->logError('Client ID, Citizen ID, Fee ID and Meter ID are required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID, Citizen ID, Fee ID and Meter ID are required');
        }

        if (is_null($transactionId)) {
            $this->logError('Transaction ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Transaction ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/meters/{$this->meterId}/transaction-meter-readings/{$transactionId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return TransactionMeterReading::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?TransactionMeterReadings {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId) || !isset($this->meterId)) {
            $this->logError('Client ID, Citizen ID, Fee ID and Meter ID are required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID, Citizen ID, Fee ID and Meter ID are required');
        }

        $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/meters/{$this->meterId}/transaction-meter-readings");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return TransactionMeterReadings::fromJson($response, self::$logger);
    }

    public function create(TransactionMeterReading $transaction): ?ResponseInterface {
        if (!isset($this->clientId) || !isset($this->citizenId) || !isset($this->feeId) || !isset($this->meterId)) {
            $this->logError('Client ID, Citizen ID, Fee ID and Meter ID are required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID, Citizen ID, Fee ID and Meter ID are required');
        }

        return parent::postContent($transaction, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/fees/{$this->feeId}/meters/{$this->meterId}/transaction-meter-readings");
    }
}
