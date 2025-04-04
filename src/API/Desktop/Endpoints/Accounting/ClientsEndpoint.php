<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\Accounting;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Accounting\Clients\Client;
use Datev\Entities\Accounting\Clients\Clients;
use InvalidArgumentException;

class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'accounting/v1';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null, ?string $select = null, ?string $expand = "all"): ?Client {
        if (is_null($id)) {
            $this->logError('ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('ID is required');
        }

        $queryParams = [];
        if (!empty($select)) {
            $queryParams[] = "select=" . urlencode($select);
        }
        if (!empty($expand)) {
            $queryParams[] = "expand=" . urlencode($expand);
        }

        $queryString = !empty($queryParams) ? '?' . implode('&', $queryParams) : '';
        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}{$queryString}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Client::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?Clients {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Clients::fromJson($response, self::$logger);
    }
}
