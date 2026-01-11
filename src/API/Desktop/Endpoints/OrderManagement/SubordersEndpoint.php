<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SubordersEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\Suborders\Suborder;
use Datev\Entities\OrderManagement\Suborders\Suborders;
use InvalidArgumentException;

class SubordersEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'orders';

    public function get(?ID $id = null): ?Suborder {
        return null;
    }

    public function getByOrderIdAndSuborderId(?int $orderId = null, ?int $suborderId = null, array $queryParams = []): ?Suborder {
        if (is_null($orderId) || is_null($suborderId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Order ID and Suborder ID are required');
        }

        return $this->logDebugWithTimer(function () use ($orderId, $suborderId, $queryParams) {
            $response = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/{$orderId}/suborders/{$suborderId}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Suborder::fromJson($response, self::$logger);
        }, "Fetching Suborder (OrderID: {$orderId}, SuborderID: {$suborderId})");
    }

    public function update(int $orderId, int $suborderId, Suborder $suborder): bool {
        return $this->logDebugWithTimer(function () use ($orderId, $suborderId, $suborder) {
            $response = parent::putContents($suborder->toArray(), [], "{$this->getEndpointUrl()}/{$orderId}/suborders/{$suborderId}");

            return $response !== false;
        }, "Updating Suborder (OrderID: {$orderId}, SuborderID: {$suborderId})");
    }
}
