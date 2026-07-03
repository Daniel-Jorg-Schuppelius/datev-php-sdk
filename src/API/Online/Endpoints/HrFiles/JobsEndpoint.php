<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobsEndpoint.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\API\Online\Endpoints\HrFiles;

use APIToolkit\Entities\ID;
use Datev\Contracts\Abstracts\API\Online\ClientScopedEndpointAbstract;
use Datev\Entities\Online\HrFiles\Jobs\JobInfo;
use InvalidArgumentException;

/**
 * hr:files v1: Status einer hochgeladenen Datei (JobInfo pro Datei).
 */
class JobsEndpoint extends ClientScopedEndpointAbstract {
    protected string $endpoint = 'v1/clients/{client-id}';

    protected string $endpointSuffix = 'jobs';

    /**
     * @param ID|string|null $jobId Job-UUID aus der Upload-Antwort
     */
    public function get(ID|string|null $jobId = null): ?JobInfo {
        if (is_null($jobId) || $jobId === '') {
            $this->logErrorAndThrow(InvalidArgumentException::class, 'Job-ID is required');
        }

        $id = $jobId instanceof ID ? $jobId->toString() : (string) $jobId;

        return $this->logDebugWithTimer(function () use ($id) {
            $response = parent::getContents([], [], "{$this->getEndpointUrl()}/" . rawurlencode($id));

            if (empty($response) || $response === '[]') {
                return null;
            }

            return JobInfo::fromJson($response, self::$logger);
        }, "Fetching HrFiles JobInfo (ID: {$id})");
    }
}
