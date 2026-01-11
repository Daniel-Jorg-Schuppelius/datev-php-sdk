<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AccountingAreasEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Law;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Law\AccountingAreas\AccountingArea;
use Datev\Entities\Law\AccountingAreas\AccountingAreas;
use InvalidArgumentException;

class AccountingAreasEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'law/v1';
    protected string $endpoint = 'accounting-areas';

    public function get(?ID $id = null): ?AccountingArea {
        if (is_null($id)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'ID is required');
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return AccountingArea::fromJson($response, self::$logger);
        }, "Fetching AccountingArea (ID: {$id})");
    }

    public function search(array $queryParams = [], array $options = []): ?AccountingAreas {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return AccountingAreas::fromJson($response, self::$logger);
        }, 'Searching AccountingAreas');
    }
}
