<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpenseTypesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Law;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Law\ExpenseTypes\ExpenseType;
use Datev\Entities\Law\ExpenseTypes\ExpenseTypes;
use InvalidArgumentException;

class ExpenseTypesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'law/v1';
    protected string $endpoint = 'expense-types';

    public function get(?ID $id = null): ?ExpenseType {
        if (is_null($id)) {
            $this->logError('ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$id->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ExpenseType::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?ExpenseTypes {
        $response = parent::getContents($queryParams, $options);

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ExpenseTypes::fromJson($response, self::$logger);
    }
}
