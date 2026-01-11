<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Payroll\Accounts\Account;
use Datev\Entities\Payroll\Accounts\Accounts;
use InvalidArgumentException;

class AccountEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'hr/v3';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null): ?Account {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/account");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Account::fromJson($response, self::$logger);
        }, "Fetching Account for Client (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?Accounts {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Accounts::fromJson($response, self::$logger);
        }, "Searching Accounts");
    }
}
