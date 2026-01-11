<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LevelsOfJurisdictionEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Law;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Law\LevelsOfJurisdiction\LevelOfJurisdiction;
use Datev\Entities\Law\LevelsOfJurisdiction\LevelsOfJurisdiction;
use InvalidArgumentException;

class LevelsOfJurisdictionEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'law/v1';
    protected string $endpoint = 'levels-of-jurisdiction';

    public function get(?ID $id = null): ?LevelOfJurisdiction {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return LevelOfJurisdiction::fromJson($response, self::$logger);
        }, "Fetching LevelOfJurisdiction (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?LevelsOfJurisdiction {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return LevelsOfJurisdiction::fromJson($response, self::$logger);
        }, 'Searching LevelsOfJurisdiction');
    }
}
