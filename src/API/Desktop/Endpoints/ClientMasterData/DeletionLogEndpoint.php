<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DeletionLogEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\DeletionLogs\DeletionLog;
use Datev\Entities\ClientMasterData\DeletionLogs\DeletionLogs;

class DeletionLogEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'clients';

    protected bool $forAddressees = false;

    public function get(?ID $id = null): ?DeletionLog {
        return null;
    }

    public function setForAddressees(bool $forAddressees): void {
        $this->forAddressees = $forAddressees;
    }

    protected function getBaseUrl(): string {
        if ($this->forAddressees) {
            return "{$this->getEndpointUrl()}/addressees/deletion-log";
        }
        return "{$this->getEndpointUrl()}/clients/deletion-log";
    }

    public function search(array $queryParams = [], array $options = []): ?DeletionLogs {
        $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return DeletionLogs::fromJson($response, self::$logger);
    }
}
