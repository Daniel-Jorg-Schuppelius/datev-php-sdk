<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IndividualReferencesAbstract.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\Contracts\Abstracts\API;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use APIToolkit\Entities\ID;
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReference;
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReferences;
use InvalidArgumentException;

abstract class IndividualReferencesAbstract extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'individual-references';

    public function get(?ID $id = null): ?IndividualReference {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }
        $result = $this->search()->getFirstValue("id", $id->toString());

        return $result;
    }

    public function search(array $queryParams = [], array $options = []): ?IndividualReferences {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return IndividualReferences::fromJson($response, self::$logger);
        }, 'Searching IndividualReferences');
    }
}
