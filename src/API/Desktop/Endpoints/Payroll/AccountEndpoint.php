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

class AccountEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'hr/v3';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null): ?Account {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/account");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Account::fromJson($response);
    }

    public function search(array $queryParams = [], array $options = []): ?Accounts {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Accounts::fromJson($response);
    }
}
