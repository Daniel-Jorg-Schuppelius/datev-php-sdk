<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentStatesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\DocumentManagement\Documents\States\DocumentState;
use Datev\Entities\DocumentManagement\Documents\States\DocumentStates;
use InvalidArgumentException;

class DocumentStatesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'documentstates';

    public function get(?ID $id = null): ?DocumentState {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return DocumentState::fromJson($response, self::$logger);
        }, "Fetching DocumentState (ID: {$id->toString()})");
    }

    public function search(array $queryParams = [], array $options = []): ?DocumentStates {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return DocumentStates::fromJson($response, self::$logger);
        }, 'Searching DocumentStates');
    }
}
