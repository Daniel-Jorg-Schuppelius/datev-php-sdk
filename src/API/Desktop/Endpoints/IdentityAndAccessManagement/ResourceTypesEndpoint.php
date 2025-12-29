<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ResourceTypesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\IdentityAndAccessManagement;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\IdentityAndAccessManagement\Schemas\ResourceTypes;

class ResourceTypesEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'iam/v1';
    protected string $endpoint = 'ResourceTypes';

    public function get(?ID $id = null): ?ResourceTypes {
        $response = parent::getContents();

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ResourceTypes::fromJson($response, self::$logger);
    }
}
