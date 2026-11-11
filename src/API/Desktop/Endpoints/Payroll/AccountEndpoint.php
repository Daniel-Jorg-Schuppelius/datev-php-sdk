<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\Payroll\PayrollEndpointAbstract;
use Datev\Entities\Payroll\Accounts\{Account, Accounts};
use InvalidArgumentException;

class AccountEndpoint extends PayrollEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'account';

    /**
     * Bankverbindung eines Mitarbeiters des gesetzten Mandanten.
     */
    public function get(?ID $id = null): ?Account {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Employee ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/employees/{$id->toString()}/{$this->endpointSuffix}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Account::fromJson($response, self::$logger);
        }, "Fetching Account for Employee (ID: {$id->toString()})");
    }

    /**
     * Bankverbindungen aller Mitarbeiter des gesetzten Mandanten.
     *
     * @param array<string, mixed> $options
     * @param array<string, mixed> $queryParams
     */
    public function search(array $queryParams = [], array $options = []): ?Accounts {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->endpointSuffix}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Accounts::fromJson($response, self::$logger);
        }, "Searching Accounts");
    }
}
