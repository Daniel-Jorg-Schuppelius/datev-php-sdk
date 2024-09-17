<?php

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Entities\ID;
use DateTime;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use Datev\Entities\Payroll\Clients\Client;
use Datev\Entities\Payroll\Clients\Clients;
use InvalidArgumentException;

class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'hr/v3';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null, ?string $expand = "all", DateTime $referenceDate = new DateTime()): Client {
        if (is_null($id)) {
            throw new InvalidArgumentException('ID is required');
        }

        $referenceDateFormatted = $referenceDate->format('Y-m-d');
        $expand = urlencode($expand);

        return Client::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}?expand={$expand}&reference-date={$referenceDateFormatted}"));
    }


    public function search(array $queryParams = [], array $options = []): Clients {
        if (!isset($queryParams['reference-date'])) {
            throw new InvalidArgumentException('reference-date is required in $queryParams');
        } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $queryParams['reference-date'])) {
            throw new InvalidArgumentException('reference-date must be in the format yyyy-mm-dd');
        }

        return Clients::fromJson(parent::getContents($queryParams, $options));
    }
}
