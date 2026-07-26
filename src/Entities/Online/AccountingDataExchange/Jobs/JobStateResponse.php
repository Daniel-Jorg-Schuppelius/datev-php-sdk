<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobStateResponse.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\AccountingDataExchange\Jobs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\Online\DataExchangeJobState;
use Psr\Log\LoggerInterface;

/**
 * Status eines Export-Jobs (GET /clients/{clientId}/jobs/{jobId}/state).
 */
class JobStateResponse extends NamedEntity {
    protected DataExchangeJobState $jobState;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getJobState(): ?DataExchangeJobState {
        return $this->jobState ?? null;
    }
}
