<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ClientGroupsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\ClientGroups\ClientGroup;
use Datev\Entities\ClientMasterData\ClientGroups\ClientGroups;
use InvalidArgumentException;

class ClientGroupsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'client-groups';

    protected ?ID $clientId = null;

    public function get(?ID $id = null): ?ClientGroup {
        return null;
    }

    public function setClientId(?ID $clientId): void {
        $this->clientId = $clientId;
    }

    protected function getBaseUrl(): string {
        if (isset($this->clientId)) {
            return "{$this->getEndpointUrl()}/clients/{$this->clientId->toString()}/client-groups";
        }
        return $this->getEndpointUrl();
    }

    public function search(array $queryParams = [], array $options = []): ?ClientGroups {
        $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ClientGroups::fromJson($response, self::$logger);
    }
}
