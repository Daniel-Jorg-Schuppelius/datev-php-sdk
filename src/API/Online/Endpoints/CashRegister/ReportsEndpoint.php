<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ReportsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\CashRegister;

use Datev\Contracts\Abstracts\API\Online\TenantScopedEndpointAbstract;

/**
 * cashregister:import v2: Meldung der Kassen-/Aufzeichnungssysteme
 * (record_keeping_systems_notification) für einen Bestand.
 */
class ReportsEndpoint extends TenantScopedEndpointAbstract {
    protected string $endpointSuffix = 'reports';

    /**
     * Übermittelt einen Report (Struktur gemäß Spezifikation:
     * record_keeping_systems_notification mit taxpayer und locations).
     *
     * @param array<string, mixed> $report
     * @param string|null $requestId Optionaler Request-Id-Header zur Nachverfolgung
     */
    public function create(array $report, ?string $requestId = null): void {
        $tenantId = self::idToString($this->tenantId);

        $this->logDebugWithTimer(function () use ($report, $requestId) {
            $options = [];
            if ($requestId !== null) {
                $options['headers'] = ['Request-Id' => $requestId];
            }

            parent::postContents($report, $options, null, 204);
        }, "Creating CashRegister Report (Tenant: {$tenantId})");
    }
}
