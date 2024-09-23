<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\DocumentManagement\AcknowledgementUsers\AcknowledgementUsers;
use Datev\Entities\DocumentManagement\CorrespondencePartnerGUID;
use Datev\Entities\DocumentManagement\Documents\Classes\DocumentClass;
use Datev\Entities\DocumentManagement\Documents\Domains\DocumentDomain;
use Psr\Log\LoggerInterface;

class Document extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?DocumentID $id;
    protected ?AcknowledgementUsers $acknowledge_by;
    protected ?float $amount;
    protected ?string $application;
    protected ?int $case_number;
    protected ?DateTime $change_date_time;
    protected ?bool $checked_out;
    protected ?DocumentClass $class;
    protected ?CorrespondencePartnerGUID $correspondence_partner_guid;
    protected ?int $correspondence_partner_firm_number;
    protected ?float $cost_quantity;
    protected ?DateTime $cost_date;
    protected ?int $cost_number1;
    protected ?int $cost_number2;
    protected ?DateTime $create_date_time;
    protected ?string $creation_user;
    protected ?DateTime $deletion_date;
    protected ?string $description;
    protected ?DocumentDomain $domain;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DocumentID {
        return $this->id;
    }
}
