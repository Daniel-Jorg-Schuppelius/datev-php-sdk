<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TransactionCommunicationsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\PublicSector;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\PublicSector\TransactionCommunications\TransactionCommunication;
use Datev\Entities\PublicSector\TransactionCommunications\TransactionCommunications;
use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

class TransactionCommunicationsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
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

    public function get(?ID $id = null): ?TransactionCommunication {
        if (is_null($id)) {
            return null;
        }
        return $this->getById((int) $id->toString());
    }

    public function getById(?int $transactionId = null): ?TransactionCommunication {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logError('Client ID and Citizen ID are required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID and Citizen ID are required');
        }

        if (is_null($transactionId)) {
            $this->logError('Transaction ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Transaction ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/transaction-communications/{$transactionId}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return TransactionCommunication::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?TransactionCommunications {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logError('Client ID and Citizen ID are required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID and Citizen ID are required');
        }

        $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/transaction-communications");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return TransactionCommunications::fromJson($response, self::$logger);
    }

    public function create(TransactionCommunication $transaction): ?ResponseInterface {
        if (!isset($this->clientId) || !isset($this->citizenId)) {
            $this->logError('Client ID and Citizen ID are required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Client ID and Citizen ID are required');
        }

        return parent::postContent($transaction, "{$this->getEndpointUrl()}/{$this->clientId->toString()}/citizens/{$this->citizenId->toString()}/transaction-communications");
    }
}
