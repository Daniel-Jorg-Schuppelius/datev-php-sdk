<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\DocumentManagement\AcknowledgementUsers\AcknowledgementUsers;
use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartnerGUID;
use Datev\Entities\DocumentManagement\Documents\Classes\DocumentClass;
use Datev\Entities\DocumentManagement\Documents\Domains\DocumentDomain;
use Datev\Entities\DocumentManagement\Documents\Folders\DocumentFolder;
use Datev\Entities\DocumentManagement\Employees\Employee;
use Datev\Entities\DocumentManagement\IndividualProperties\IndividualProperties;
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReferences;
use Datev\Entities\DocumentManagement\Notes\Note;
use Datev\Entities\DocumentManagement\Orders\Order;
use Datev\Entities\DocumentManagement\PropertyTemplates\PropertyTemplate;
use Datev\Entities\DocumentManagement\Registers\Register;
use Datev\Entities\DocumentManagement\SecureAreas\SecureArea;
use Datev\Entities\DocumentManagement\States\State;
use Datev\Entities\DocumentManagement\StructureItems\StructureItems;
use Datev\Entities\DocumentManagement\Users\User;
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
    protected ?Employee $employee;
    protected ?DateTime $export_date_time;
    protected ?string $extension;
    protected ?DocumentFolder $folder;
    protected ?bool $is_binder;
    protected ?bool $is_shared;
    protected ?DateTime $import_date_time;
    protected ?bool $inbox;
    protected ?DateTime $inbox_date;
    protected ?IndividualProperties $individual_properties;
    protected ?IndividualReferences $individual_references;
    protected ?string $keywords;
    protected ?int $month;
    protected ?string $more_years;
    protected ?Note $note;
    protected ?int $number;
    protected ?Order $order;
    protected ?bool $outbox;
    protected ?DateTime $outbox_date;
    protected ?bool $outbox_parked;
    protected ?int $priority;
    protected ?PropertyTemplate $property_template;
    protected ?bool $read_only;
    protected ?DateTime $receipt_date;
    protected ?int $receipt_number;
    protected ?bool $reference_file;
    protected ?Register $register;
    protected ?string $revision_user;
    protected ?SecureArea $secure_area;
    protected ?State $state;
    protected ?StructureItems $structure_items;
    protected ?User $user;
    protected ?int $year;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): DocumentID {
        return $this->id;
    }

    protected function getArray(string $dateFormat = "Y-m-d\TH:i:s"): array {
        return parent::getArray($dateFormat);
    }
}
