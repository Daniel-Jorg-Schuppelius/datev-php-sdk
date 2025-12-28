<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InitialActivitiesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use APIToolkit\Contracts\Interfaces\API\ApiClientInterface;
use Datev\Contracts\Abstracts\API\Desktop\Payroll\PayrollEndpointAbstract;
use Datev\Entities\Common\Clients\ClientID;
use Datev\Entities\Payroll\Employees\EmployeeID;
use Datev\Entities\Payroll\InitialActivities\InitialActivities;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

class InitialActivitiesEndpoint extends PayrollEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'initial-activities';

    protected EmployeeID $employeeID;

    public function __construct(ApiClientInterface $client, ?LoggerInterface $logger = null, ClientID $clientID = new ClientID(), EmployeeID $employeeID = new EmployeeID()) {
        parent::__construct($client, $logger, $clientID);
        $this->employeeID = $employeeID;
    }

    public function getEmployeeID(): EmployeeID {
        return $this->employeeID;
    }

    public function setEmployeeID(EmployeeID $employeeID): void {
        $this->employeeID = $employeeID;
    }

    public function search(array $queryParams = [], array $options = []): ?InitialActivities {
        if (!$this->employeeID->isValid()) {
            $this->logError('Employee ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('Employee ID is required');
        }

        $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/employees/{$this->employeeID->toString()}/{$this->endpointSuffix}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return InitialActivities::fromJson($response, self::$logger);
    }
}
