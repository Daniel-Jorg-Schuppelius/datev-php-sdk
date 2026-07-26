<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EauRequest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Online\HrEau\EauRequests;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

/**
 * Anfrage einer elektronischen Arbeitsunfähigkeitsbescheinigung (eAU).
 */
class EauRequest extends NamedEntity {
    protected string $source;

    protected string $start_work_incapacity;

    protected string $collaboration_identifier;

    protected Notification $notification;

    protected ContactPerson $contact_person;

    protected bool $follow_up_certification;

    /**
     * @param array<string, mixed>|object|null $data
     */
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

    public function getNotification(): ?Notification {
        return $this->notification ?? null;
    }

    public function getContactPerson(): ?ContactPerson {
        return $this->contact_person ?? null;
    }

    public function isFollowUpCertification(): bool {
        return $this->follow_up_certification ?? false;
    }
}
