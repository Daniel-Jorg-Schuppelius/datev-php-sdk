<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\GUID;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\Clients\Client;
use Datev\Entities\OrderManagement\Clients\Clients;
use InvalidArgumentException;

class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'selfclients';

    public function get(?ID $id = null): ?Client {
        if ($id instanceof GUID) {
            return $this->getByGuid($id);
        }
        return $this->getByGuid($id !== null ? new GUID($id->toString()) : null);
    }

    public function getByGuid(?GUID $id = null): ?Client {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Client::fromJson($response, self::$logger);
        }, "Fetching Client (GUID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?Clients {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Clients::fromJson($response, self::$logger);
        }, 'Searching Clients');
    }
}
