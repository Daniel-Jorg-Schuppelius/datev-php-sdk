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

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Entities\DocumentManagement\Documents\States\DocumentState;
use Datev\Entities\DocumentManagement\Documents\States\DocumentStates;

class DocumentStatesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'documentstates';

    public function get(?ID $id = null): DocumentState {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        return DocumentState::fromJson(parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}"));
    }

    public function search(array $queryParams = [], array $options = []): DocumentStates {
        return DocumentStates::fromJson(parent::getContents($queryParams, $options));
    }
}
