<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EauRequestsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrEau;

use Datev\API\Online\Support\JobLocation;
use Datev\Contracts\Abstracts\API\Online\EmployeeScopedEndpointAbstract;
use Datev\Entities\Online\HrEau\EauRequests\{EauRequest, Feedbacks};

/**
 * hr:eau v1: elektronische Arbeitsunfähigkeitsbescheinigungen eines
 * Arbeitnehmers. Adressierung über Verbundnummer + Personalnummer:
 * /clients/{consultantNumber}-{clientNumber}/employees/{personnelNumber}/eau-requests
 */
class EauRequestsEndpoint extends EmployeeScopedEndpointAbstract {
    protected string $endpointSuffix = 'eau-requests';

    /**
     * Stellt eine eAU-Anfrage (201 + location-Header der angelegten Anfrage).
     *
     * @param EauRequest|array<string, mixed> $request
     */
    public function create(EauRequest|array $request): ?JobLocation {
        $data = $request instanceof EauRequest ? $request->toArray() : $request;

        return $this->logDebugWithTimer(function () use ($data) {
            $response = $this->requestResponse('POST', null, ['json' => $data], 201);

            return JobLocation::fromResponse($response);
        }, 'Creating eAU request');
    }

    /**
     * Liefert die Krankenkassen-Rückmeldungen zu einer eAU-Anfrage.
     */
    public function getFeedbacks(string $eauRequestId): ?Feedbacks {
        return $this->logDebugWithTimer(function () use ($eauRequestId) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($eauRequestId) . '/feedbacks');

            if (empty($response) || $response === '[]') {
                return null;
            }

            return Feedbacks::fromJson($response, self::$logger);
        }, "Fetching eAU feedbacks (ID: {$eauRequestId})");
    }

    /**
     * Storniert eine eAU-Anfrage (DELETE, 204).
     */
    public function cancel(string $eauRequestId): void {
        $this->logDebugWithTimer(function () use ($eauRequestId) {
            parent::deleteContents([], "{$this->getEndpointUrl()}/" . rawurlencode($eauRequestId), 204);
        }, "Cancelling eAU request (ID: {$eauRequestId})");
    }
}
