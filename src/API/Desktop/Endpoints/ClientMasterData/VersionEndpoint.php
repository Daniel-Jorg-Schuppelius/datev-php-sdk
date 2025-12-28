<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : VersionEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\Versions\Version;

class VersionEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'version';

    public function get(): ?Version {
        $response = parent::getContents();

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Version::fromJson($response, self::$logger);
    }
}
