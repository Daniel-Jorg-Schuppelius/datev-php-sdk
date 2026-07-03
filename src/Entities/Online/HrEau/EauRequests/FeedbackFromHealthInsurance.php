<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeedbackFromHealthInsurance.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrEau\EauRequests;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Einzelne Rückmeldung einer Krankenkasse zur eAU-Anfrage.
 */
class FeedbackFromHealthInsurance extends NamedEntity {
    protected string $guid;

    protected ContactPersonHealthInsurance $contact_person;

    protected IncapacityForWork $incapacity_for_work;

    protected ErrorBlocks $error_block_list;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getGuid(): ?string {
        return $this->guid ?? null;
    }

    public function getContactPerson(): ?ContactPersonHealthInsurance {
        return $this->contact_person ?? null;
    }

    public function getIncapacityForWork(): ?IncapacityForWork {
        return $this->incapacity_for_work ?? null;
    }

    public function getErrorBlockList(): ?ErrorBlocks {
        return $this->error_block_list ?? null;
    }
}
