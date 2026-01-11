<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualPropertiesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperties;

class IndividualPropertiesEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'individual-properties';

    public function get(?ID $id = null): ?IndividualProperties {
        return $this->logDebugWithTimer(function () {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return IndividualProperties::fromJson($response, self::$logger);
        }, 'Fetching IndividualProperties');
    }
}
