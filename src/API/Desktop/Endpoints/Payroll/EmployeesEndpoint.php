<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Payroll\Clients\ClientID;
use Datev\Entities\Payroll\Employees\Employee;
use Datev\Entities\Payroll\Employees\Employees;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

class EmployeesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'hr/v3';
    protected string $endpoint = 'clients/{client-id}';
    protected string $endpointSuffix = 'employees';

    protected ClientID $clientID;

    public function __construct(ApiClientInterface $client, ?LoggerInterface $logger = null, ClientID $clientID = new ClientID()) {
        parent::__construct($client, $logger);
        $this->clientID = $clientID;
    }

    public function get(?ID $id = null): ?Employee {
        if (is_null($id)) {
            $this->logError('ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Employee::fromJson($response);
    }

    public function search(array $queryParams = [], array $options = []): ?Employees {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Employees::fromJson($response);
    }

    public function getClientID(): ClientID {
        return $this->clientID;
    }

    public function setClientID(ClientID $clientID): void {
        $this->clientID = $clientID;
    }

    protected function getEndpointUrl(): string {
        return str_replace('{client-id}', $this->clientID->toString(), parent::getEndpointUrl());
    }
}
