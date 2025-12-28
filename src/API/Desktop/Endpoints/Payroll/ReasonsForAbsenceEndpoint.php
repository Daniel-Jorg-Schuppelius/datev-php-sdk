<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ReasonsForAbsenceEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Desktop\Endpoints\Payroll;

use APIToolkit\Contracts\Interfaces\API\EndpointInterfaces\SearchableEndpointInterface;
use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Desktop\Payroll\PayrollEndpointAbstract;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonForAbsence;
use Datev\Entities\Payroll\ReasonsForAbsence\ReasonsForAbsence;
use InvalidArgumentException;

class ReasonsForAbsenceEndpoint extends PayrollEndpointAbstract implements SearchableEndpointInterface {
    protected string $endpointSuffix = 'reasons-for-absence';

    public function get(?ID $id = null): ?ReasonForAbsence {
        if (is_null($id)) {
            $this->logError('ID is required (Class:' . static::class . ')');
            throw new InvalidArgumentException('ID is required');
        }

        $response = parent::getContents([], [], "{$this->getEndpointUrl()}/{$this->endpointSuffix}/{$id->toString()}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ReasonForAbsence::fromJson($response, self::$logger);
    }

    public function search(array $queryParams = [], array $options = []): ?ReasonsForAbsence {
        $response = parent::getContents($queryParams, $options, "{$this->getEndpointUrl()}/{$this->endpointSuffix}");

        if (empty($response) || $response === '[]') {
            return null;
        }

        return ReasonsForAbsence::fromJson($response, self::$logger);
    }
}
