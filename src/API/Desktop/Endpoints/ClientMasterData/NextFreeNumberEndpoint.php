<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NextFreeNumberEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\ClientMasterData\NextFreeNumbers\NextFreeNumber;

class NextFreeNumberEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'clients';

    protected function getBaseUrl(): string {
        return "{$this->getEndpointUrl()}/next-free-number";
    }

    public function get(): ?NextFreeNumber {
        $response = parent::getContents([], [], $this->getBaseUrl());

        if (empty($response) || $response === '[]') {
            return null;
        }

        return NextFreeNumber::fromJson($response, self::$logger);
    }
}
