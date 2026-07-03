<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : GrossPaymentsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExchange;

use Datev\Contracts\Abstracts\API\Online\{EmployeeScopedEndpointAbstract, HrExchangeJobWrites};
use Datev\Entities\Online\HrExchange\Employees\GrossPayment;
use Datev\Entities\Online\HrExchange\Jobs\Job;

/**
 * hr:exchange v1: Bruttobezüge (Festbezüge) eines Arbeitnehmers (202-async).
 */
class GrossPaymentsEndpoint extends EmployeeScopedEndpointAbstract {
    use HrExchangeJobWrites;

    protected string $endpointSuffix = 'gross-payments';

    /**
     * @param GrossPayment|array<string, mixed> $grossPayment
     */
    public function create(GrossPayment|array $grossPayment): ?Job {
        $data = $grossPayment instanceof GrossPayment ? $grossPayment->toArray() : $grossPayment;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('POST', null, $data),
            'Creating GrossPayment'
        );
    }

    /**
     * @param GrossPayment|array<string, mixed> $grossPayment
     */
    public function update(GrossPayment|array $grossPayment): ?Job {
        $data = $grossPayment instanceof GrossPayment ? $grossPayment->toArray() : $grossPayment;

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('PUT', null, $data),
            'Updating GrossPayment'
        );
    }

    /**
     * @param GrossPayment|array<string, mixed> $grossPayment
     */
    public function updateById(int|string $grossPaymentId, GrossPayment|array $grossPayment): ?Job {
        $data = $grossPayment instanceof GrossPayment ? $grossPayment->toArray() : $grossPayment;
        $urlPath = "{$this->getEndpointUrl()}/" . rawurlencode((string) $grossPaymentId);

        return $this->logDebugWithTimer(
            fn () => $this->writeJob('PUT', $urlPath, $data),
            "Updating GrossPayment (ID: {$grossPaymentId})"
        );
    }
}
