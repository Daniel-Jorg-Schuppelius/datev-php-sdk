<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CountryCodesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\CountryCodes\CountryCode;
use Datev\Entities\ClientMasterData\CountryCodes\CountryCodes;

class CountryCodesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'country-codes';

    public function get(?ID $id = null): ?CountryCode {
        return null;
    }

    public function search(array $queryParams = [], array $options = []): ?CountryCodes {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return CountryCodes::fromJson($response, self::$logger);
        }, 'Searching CountryCodes');
    }
}
