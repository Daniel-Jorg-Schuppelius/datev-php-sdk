<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResponsibilitiesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\Responsibilities\Responsibility;
use Datev\Entities\ClientMasterData\Responsibilities\Responsibilities;

class ResponsibilitiesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'responsibilities';

    protected ?ID $clientId = null;

    public function get(?ID $id = null): ?Responsibility {
        return null;
    }

    public function setClientId(?ID $clientId): void {
        $this->clientId = $clientId;
    }

    protected function getBaseUrl(): string {
        if (isset($this->clientId)) {
            return "{$this->getEndpointUrl()}/clients/{$this->clientId->toString()}/responsibilities";
        }
        return $this->getEndpointUrl();
    }

    public function search(array $queryParams = [], array $options = []): ?Responsibilities {
        $response = parent::getContents($queryParams, $options, $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Responsibilities::fromJson($response, self::$logger);
    }
}
