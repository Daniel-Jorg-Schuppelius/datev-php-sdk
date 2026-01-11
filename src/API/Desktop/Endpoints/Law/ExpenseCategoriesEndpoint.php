<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpenseCategoriesEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Law;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\Law\ExpenseCategories\ExpenseCategory;
use Datev\Entities\Law\ExpenseCategories\ExpenseCategories;

class ExpenseCategoriesEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'law/v1';
    protected string $endpoint = 'expense-categories';

    public function get(?ID $id = null): ?ExpenseCategory {
        if (is_null($id)) {
            return null;
        }
        return $this->getByNumber((int) $id->toString());
    }

    public function getByNumber(?int $number = null): ?ExpenseCategory {
        if (is_null($number)) {
            return null;
        }

        return $this->logDebugWithTimer(function () use ($number) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$number}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ExpenseCategory::fromJson($response, self::$logger);
        }, "Fetching ExpenseCategory (Number: {$number})");
    }

    public function search(array $queryParams = [], array $options = []): ?ExpenseCategories {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options);

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ExpenseCategories::fromJson($response, self::$logger);
        }, 'Searching ExpenseCategories');
    }
}
