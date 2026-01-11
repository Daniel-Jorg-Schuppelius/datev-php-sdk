<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ExpensePostingsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\ExpensePostings\ExpensePosting;
use Datev\Entities\OrderManagement\ExpensePostings\ExpensePostings;
use InvalidArgumentException;

class ExpensePostingsEndpoint extends EndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'orders';

    public function get(?ID $id = null): ?ExpensePosting {
        if (is_null($id)) {
            return null;
        }

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/expensepostings/{$id->toString()}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ExpensePosting::fromJson($response, self::$logger);
        }, "Fetching ExpensePosting (ID: {$id})");
    }

    public function getForOrder(int $orderId, array $queryParams = []): ?ExpensePostings {
        return $this->logDebugWithTimer(function () use ($orderId, $queryParams) {
            $response = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/{$orderId}/expensepostings");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ExpensePostings::fromJson($response, self::$logger);
        }, "Fetching ExpensePostings for Order (ID: {$orderId})");
    }

    public function search(array $queryParams = [], array $options = []): ?ExpensePostings {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/expensepostings");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return ExpensePostings::fromJson($response, self::$logger);
        }, 'Searching ExpensePostings');
    }

    public function create(int $orderId, ExpensePosting $expensePosting, array $queryParams = []): bool {
        return $this->logDebugWithTimer(function () use ($orderId, $expensePosting, $queryParams) {
            $response = parent::postContents($expensePosting->toArray(), $queryParams, "{$this->getEndpointUrl()}/{$orderId}/expensepostings");

            return $response !== false;
        }, "Creating ExpensePosting for Order (ID: {$orderId})");
    }
}
