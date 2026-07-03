<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Feedback.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrEau\EauRequests;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Rückmeldung zu einer eAU-Anfrage inkl. Krankenkassen-Antworten.
 */
class Feedback extends NamedEntity {
    protected string $source;

    protected string $start_work_incapacity;

    protected string $collaboration_identifier;

    protected FeedbacksFromHealthInsurance $feedbacks_from_health_insurance;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getSource(): ?string {
        return $this->source ?? null;
    }

    public function getStartWorkIncapacity(): ?string {
        return $this->start_work_incapacity ?? null;
    }

    public function getCollaborationIdentifier(): ?string {
        return $this->collaboration_identifier ?? null;
    }

    public function getFeedbacksFromHealthInsurance(): ?FeedbacksFromHealthInsurance {
        return $this->feedbacks_from_health_insurance ?? null;
    }
}
