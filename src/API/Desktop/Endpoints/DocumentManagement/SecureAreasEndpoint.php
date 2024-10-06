<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SecureAreasEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\DocumentManagement\SecureAreas\SecureArea;
use Datev\Entities\DocumentManagement\SecureAreas\SecureAreas;

class SecureAreasEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'secure-areas';

    public function get(?ID $id = null): ?SecureArea {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }

        $result = $this->search()->getFirstValue("id", $id->toString());

        return $result;
    }

    public function search(array $queryParams = [], array $options = []): ?SecureAreas {
        $response = parent::getContents($queryParams, $options);

        if (empty($response)) {
            return null;
        }

        return SecureAreas::fromJson($response);
    }
}
