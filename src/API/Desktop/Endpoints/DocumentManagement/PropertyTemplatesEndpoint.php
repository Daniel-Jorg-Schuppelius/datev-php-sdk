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

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplate;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplates;
use InvalidArgumentException;

class PropertyTemplatesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'property-templates';

    public function get(?ID $id = null): ?PropertyTemplate {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        $result = $this->search()->getFirstValue("id", $id->toString());

        return $result;
    }

    public function search(array $queryParams = [], array $options = []): ?PropertyTemplates {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return PropertyTemplates::fromJson($response, self::$logger);
        }, 'Searching PropertyTemplates');
    }
}
