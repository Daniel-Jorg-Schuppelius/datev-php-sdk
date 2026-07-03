<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EmployeeIdsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrExports;

use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\HrExports\EmployeeIds\EmployeeIds;

/**
 * hr:exports v1: Auflösung der Firmen-Personalnummer zur DATEV-Personalnummer.
 */
class EmployeeIdsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpointSuffix = 'employeeids';

    public function resolve(string $companyPersonnelNumber): ?EmployeeIds {
        return $this->logDebugWithTimer(function () use ($companyPersonnelNumber) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($companyPersonnelNumber));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return EmployeeIds::fromJson($response, self::$logger);
        }, "Resolving employee id (Company personnel number: {$companyPersonnelNumber})");
    }
}
