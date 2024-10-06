<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DomainsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\DocumentManagement\Domains\Domain;
use Datev\Entities\DocumentManagement\Domains\Domains;

class DomainsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'domains';

    public function get(?ID $id = null): ?Domain {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        $result = $this->search()->getFirstValue("id", $id->toString());

        return $result;
    }

    public function search(array $queryParams = [], array $options = []): ?Domains {
        $response = parent::getContents($queryParams, $options);

        if (empty($response)) {
            return null;
        }

        return Domains::fromJson($response);
    }
}
