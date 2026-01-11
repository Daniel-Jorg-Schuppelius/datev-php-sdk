<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : PrivateInsuranceEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use Datev\Contracts\Abstracts\API\Desktop\Payroll\PayrollEndpointAbstract;
use Datev\Entities\Payroll\Insurances\Private\PrivateInsurances;

class PrivateInsuranceEndpoint extends PayrollEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'private-insurance';

    public function search(array $queryParams = [], array $options = []): ?PrivateInsurances {
        return $this->logDebugWithTimer(function () use ($queryParams, $options) {
            $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->endpointSuffix}");

            if (empty($response) || $response === '[]') {
                return null;
            }

            return PrivateInsurances::fromJson($response, self::$logger);
        }, "Searching PrivateInsurances");
    }
}
