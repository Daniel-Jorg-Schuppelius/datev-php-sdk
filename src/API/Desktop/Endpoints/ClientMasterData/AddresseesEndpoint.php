<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddresseesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\Addressees\Addressee;
use Datev\Entities\ClientMasterData\Addressees\Addressees;
use InvalidArgumentException;

class AddresseesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'addressees';

    public function get(?ID $id = null): ?Addressee {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Addressee::fromJson($response, self::$logger);
        }, "Fetching Addressee (ID: {$id->toString()})");
    }

    public function search(array $queryParams = [], array $options = []): ?Addressees {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Addressees::fromJson($response, self::$logger);
        }, 'Searching Addressees');
    }
}
