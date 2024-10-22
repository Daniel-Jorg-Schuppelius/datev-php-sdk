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

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use APIToolkit\Logger\ConsoleLoggerFactory;
use DateTime;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Payroll\Clients\Client;
use Datev\Entities\Payroll\Clients\Clients;
use InvalidArgumentException;

class ClientsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'hr/v3';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null, ?string $expand = "all", DateTime $referenceDate = new DateTime()): ?Client {
        if (is_null($id)) {
            throw new InvalidArgumentException('ID is required');
        }

        $referenceDateFormatted = $referenceDate->format('Y-m-d');
        $expand = urlencode($expand);

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}?expand={$expand}&reference-date={$referenceDateFormatted}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Client::fromJson($response);
    }


    public function search(array $queryParams = [], array $options = []): ?Clients {
        if (is_null($this->logger)) {
            $this->logger = ConsoleLoggerFactory::getLogger();
        }

        if (!isset($queryParams['reference-date'])) {
            $this->logger->info('No reference-date provided. Using current date.');
            $queryParams['reference-date'] = date('Y-m-d');
        } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $queryParams['reference-date'])) {
            $this->logger->error('Invalid reference-date provided.');
            throw new InvalidArgumentException('reference-date must be in the format yyyy-mm-dd');
        }

        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Clients::fromJson($response);
    }
}
