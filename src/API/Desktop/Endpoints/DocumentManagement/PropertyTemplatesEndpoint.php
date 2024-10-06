<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PropertyTemplatesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use APIToolkit\Exceptions\NotFoundException;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplate;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplates;

class PropertyTemplatesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'property-templates';

    public function get(?ID $id = null): PropertyTemplate {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }
        $proptertyTemplates = $this->search()->getValues("id", $id->toString());
        $result = array_pop($proptertyTemplates);

        if (is_null($result)) {
            throw new NotFoundException('Resource not found', 404);
        }

        return $result;
    }

    public function search(array $queryParams = [], array $options = []): PropertyTemplates {
        return PropertyTemplates::fromJson(parent::getContents($queryParams, $options));
    }
}
