<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SchemasEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\IdentityAndAccessManagement;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\IdentityAndAccessManagement\Schemas\ScimSchema;
use Datev\Entities\IdentityAndAccessManagement\Schemas\ScimSchemas;

class SchemasEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'iam/v1';
    protected string $endpoint = 'Schemas';

    public function get(?ID $id = null): ScimSchema|ScimSchemas|null {
        return $this->getById($id?->toString());
    }

    public function getById(?string $schemaId = null): ScimSchema|ScimSchemas|null {
        if (!is_null($schemaId)) {
            return $this->logDebugWithTimer(function () use ($schemaId) {
                $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . urlencode($schemaId));

                if (empty($response) || $response === '[]') {
                    return null;
                }

                return ScimSchema::fromJson($response, self::$logger);
            }, "Fetching ScimSchema (ID: {$schemaId})");
        }

        return $this->logDebugWithTimer(function () {
            $response = parent::getContents();

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ScimSchemas::fromJson($response, self::$logger);
        }, 'Fetching ScimSchemas');
    }
}
