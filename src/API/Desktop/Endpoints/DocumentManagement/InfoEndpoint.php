<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : InfoEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\DocumentManagement;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\DocumentManagement\Infos\Info;

class InfoEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'dms/v2';
    protected string $endpoint = 'info';

    public function get(?ID $id = null): ?Info {
        $response = parent::getContents([], [], "{$this->getEndpointUrl()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return Info::fromJson($response);
    }
}
