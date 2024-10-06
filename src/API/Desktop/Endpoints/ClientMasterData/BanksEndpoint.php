<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BanksEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

namespace Datev\API\Desktop\Endpoints\ClientMasterData;

use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Contracts\Interfaces\API\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use APIToolkit\Exceptions\NotFoundException;
use Datev\Entities\ClientMasterData\Banks\Bank;
use Datev\Entities\ClientMasterData\Banks\Banks;

class BanksEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'master-data/v1';
    protected string $endpoint = 'banks';

    public function get(?ID $id = null): Bank {
        if (is_null($id)) {
            throw new \InvalidArgumentException('ID is required');
        }
        $areaOfResponsibilities = $this->search()->getValues("id", $id->toString());
        $result = array_pop($areaOfResponsibilities);

        if (is_null($result)) {
            throw new NotFoundException('Resource not found', 404);
        }

        return $result;
    }

    public function search(array $queryParams = [], array $options = []): Banks {
        return Banks::fromJson(parent::getContents($queryParams, $options));
    }
}
