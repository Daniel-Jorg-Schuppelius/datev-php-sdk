<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobInfo.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrFiles\Jobs;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\Online\HrFileJobState;
use Psr\Log\LoggerInterface;

/**
 * Status einer über hr:files hochgeladenen Datei (ein JobInfo pro Datei).
 */
class JobInfo extends NamedEntity {
    protected string $job_id;

    protected string $timestamp;

    protected HrFileJobState $state;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getJobId(): ?string {
        return $this->job_id ?? null;
    }

    public function getTimestamp(): ?string {
        return $this->timestamp ?? null;
    }

    public function getState(): ?HrFileJobState {
        return $this->state ?? null;
    }
}
