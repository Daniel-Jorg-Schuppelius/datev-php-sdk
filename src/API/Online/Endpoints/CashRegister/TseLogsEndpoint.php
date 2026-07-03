<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : TseLogsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\CashRegister;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Online\TenantScopedEndpointAbstract;
use Datev\Entities\Online\CashRegister\TseLogs\TseLogInfo;
use InvalidArgumentException;

/**
 * cashregister:import v2: Informationen zu hochgeladenen TSE-Logs
 * einer technischen Sicherheitseinrichtung (per Seriennummer).
 */
class TseLogsEndpoint extends TenantScopedEndpointAbstract {
    protected string $endpointSuffix = 'tselogs';

    /**
     * @param ID|string|null $serialNumber Seriennummer der TSE
     */
    public function get(ID|string|null $serialNumber = null): ?TseLogInfo {
        if (is_null($serialNumber) || $serialNumber === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Serial number is required');
        }

        $serial = $serialNumber instanceof ID ? $serialNumber->toString() : (string) $serialNumber;

        return $this->logDebugWithTimer(function () use ($serial) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($serial));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return TseLogInfo::fromJson($response, self::$logger);
        }, "Fetching TseLogInfo (Serial: {$serial})");
    }
}
