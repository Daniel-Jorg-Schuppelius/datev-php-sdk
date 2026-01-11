<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TaxAuthoritiesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\TaxAuthorities\TaxAuthority;
use Datev\Entities\ClientMasterData\TaxAuthorities\TaxAuthorities;

class TaxAuthoritiesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'tax-authorities';

    public function get(?ID $id = null): ?TaxAuthority {
        return null;
    }

    public function search(array $queryParams = [], array $options = []): ?TaxAuthorities {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return TaxAuthorities::fromJson($response, self::$logger);
        }, 'Searching TaxAuthorities');
    }
}
