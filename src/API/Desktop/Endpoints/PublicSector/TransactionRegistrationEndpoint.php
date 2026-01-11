<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionRegistrationEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\TransactionRegistrations\TransactionRegistration;
use Datev\Entities\PublicSector\TransactionRegistrations\TransactionRegistrations;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

class TransactionRegistrationEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'public-sector/v1';
    protected string $endpoint = 'clients';

    protected GUID $clientId;
    protected GUID $citizenId;

    public function setClientId(GUID $clientId): void {
        $this->clientId = $clientId;
    }

    public function setCitizenId(GUID $citizenId): void {
        $this->citizenId = $citizenId;
    }

    public function get(?ID $id = null): ?TransactionRegistration {
        if (is_null($id)) {
            return null;
        }
        return $this->getById((int) $id->toString());
    }

    public function getById(?int $transactionId = null): ?TransactionRegistration {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID and Citizen ID are required');
        }

        if (is_null($transactionId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Transaction ID is required');
        }

        return $this->logDebugWithTimer(function () use ($transactionId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/transaction-registration/{$transactionId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return TransactionRegistration::fromJson($response, self::$logger);
        }, "Fetching TransactionRegistration (ID: {$transactionId})");
    }

    public function search(array $queryParams = [], array $options = []): ?TransactionRegistrations {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID and Citizen ID are required');
        }

        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/transaction-registration");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return TransactionRegistrations::fromJson($response, self::$logger);
        }, "Searching TransactionRegistrations");
    }

    public function create(TransactionRegistration $transaction): ?ResponseInterface {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Client ID and Citizen ID are required');
        }

        return $this->logDebugWithTimer(function () use ($transaction) {
            return parent::postContent($transaction, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/transaction-registration");
        }, "Creating TransactionRegistration");
    }
}
