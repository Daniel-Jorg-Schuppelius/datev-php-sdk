<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeeVersionsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Law;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Law\FeeVersions\FeeVersion;
use Datev\Entities\Law\FeeVersions\FeeVersions;

class FeeVersionsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'law/v1';
    protected string $endpoint = 'fee-versions';

    public function get(?ID $id = null): ?FeeVersion {
        if (is_null($id)) {
            return null;
        }
        return $this->getByNumber((int) $id->toString());
    }

    public function getByNumber(?int $number = null): ?FeeVersion {
        if (is_null($number)) {
            return null;
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$number}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return FeeVersion::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?FeeVersions {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return FeeVersions::fromJson($response, self::$logger);
    }
}
