<?php
/*
 * Created on   : Sun Jan 12 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostItemsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\OrderManagement;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\EndpointAbstract;
use Datev\Entities\OrderManagement\CostItems\CostItems;
use InvalidArgumentException;

class CostItemsEndpoint extends EndpointAbstract {
    protected string $endpointPrefix = 'order-management/v1';
    protected string $endpoint = 'orders';

    public function get(?ID $id = null): ?CostItems {
        if (is_null($id)) {
            return null;
        }
        return $this->getByOrderId((int) $id->toString());
    }

    public function getByOrderId(?int $orderId = null, array $queryParams = []): ?CostItems {
        if (is_null($orderId)) {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Order ID is required');
        }

        return $this->logDebugWithTimer(function () use ($orderId, $queryParams) {
            $response = parent::getContents($queryParams, [], "{$this->getEndpointUrl()}/{$orderId}/costitems");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return CostItems::fromJson($response, self::$logger);
        }, "Fetching CostItems for Order (ID: {$orderId})");
    }
}
