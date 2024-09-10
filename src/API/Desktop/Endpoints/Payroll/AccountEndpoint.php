<?php

namespace Datev\Api\Desktop\Endpoints\Payroll;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Entities\Payroll\Accounts\Account;
use Datev\Entities\Payroll\Accounts\Accounts;

class AccountEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'hr/v3';
    protected string $endpoint = 'clients';

    public function get(?ID $id = null): Account {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        return Account::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}/account"));
    }

    public function search(array $queryParams = [], array $options = []): Accounts {
        return Accounts::fromJson(parent::getContents($queryParams, $options));
    }
}