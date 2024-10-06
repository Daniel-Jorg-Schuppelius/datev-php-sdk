<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Document.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

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
use Datev\Entities\DocumentManagement\IndividualReferences\IndividualReference;
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
    protected ?User $creation_user;
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
    protected ?string $individual_property1;
    protected ?string $individual_property2;
    protected ?string $individual_property3;
    protected ?string $individual_property4;
    protected ?float $individual_property5;
    protected ?float $individual_property6;
    protected ?bool $individual_property7;
    protected ?bool $individual_property8;
    protected ?DateTime $individual_property9;
    protected ?DateTime $individual_property10;
    protected ?IndividualReference $individual_reference1;
    protected ?IndividualReference $individual_reference2;
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
    protected ?ReceiptNumber $receipt_number;
    protected ?bool $reference_file;
    protected ?Register $register;
    protected ?User $revision_user;
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

    public function getAcknowledgementUsers(): ?AcknowledgementUsers {
        return $this->acknowledge_by ?? null;
    }

    public function getAmount(): ?float {
        return $this->amount ?? null;
    }

    public function getApplication(): ?string {
        return $this->application ?? null;
    }

    public function getCaseNumber(): ?int {
        return $this->case_number ?? null;
    }

    public function getChangeDateTime(): ?DateTime {
        return $this->change_date_time ?? null;
    }

    public function isCheckedOut(): bool {
        return $this->checked_out ?? false;
    }

    public function getClass(): ?DocumentClass {
        return $this->class ?? null;
    }

    public function getCorrespondencePartnerGUID(): ?CorrespondencePartnerGUID {
        return $this->correspondence_partner_guid ?? null;
    }

    public function getCorrespondencePartnerFirmNumber(): ?int {
        return $this->correspondence_partner_firm_number ?? null;
    }

    public function getCostQuantity(): ?float {
        return $this->cost_quantity ?? null;
    }

    public function getCostDate(): ?DateTime {
        return $this->cost_date ?? null;
    }

    public function getCostNumber1(): ?int {
        return $this->cost_number1 ?? null;
    }

    public function getCostNumber2(): ?int {
        return $this->cost_number2 ?? null;
    }

    public function getCreateDateTime(): ?DateTime {
        return $this->create_date_time ?? null;
    }

    public function getCreationUser(): ?string {
        return $this->creation_user ?? null;
    }

    public function getDeletionDate(): ?DateTime {
        return $this->deletion_date ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getDomain(): ?DocumentDomain {
        return $this->domain ?? null;
    }

    public function getEmployee(): ?Employee {
        return $this->employee ?? null;
    }

    public function getExportDateTime(): ?DateTime {
        return $this->export_date_time ?? null;
    }

    public function getExtension(): ?string {
        return $this->extension ?? null;
    }

    public function getFolder(): ?DocumentFolder {
        return $this->folder ?? null;
    }

    public function isBinder(): bool {
        return $this->is_binder ?? false;
    }

    public function isShared(): bool {
        return $this->is_shared ?? false;
    }

    public function getImportDateTime(): ?DateTime {
        return $this->import_date_time ?? null;
    }

    public function isInbox(): bool {
        return $this->inbox ?? false;
    }

    public function getInboxDate(): ?DateTime {
        return $this->inbox_date ?? null;
    }

    public function getIndividualProperties(): ?IndividualProperties {
        return $this->individual_properties ?? null;
    }

    public function getIndividualReference1(): ?IndividualReference {
        return $this->individual_reference1 ?? null;
    }

    public function getIndividualReference2(): ?IndividualReference {
        return $this->individual_reference2 ?? null;
    }

    public function getKeywords(): ?string {
        return $this->keywords ?? null;
    }

    public function getMonth(): ?int {
        return $this->month ?? null;
    }

    public function getMoreYears(): ?string {
        return $this->more_years ?? null;
    }

    public function getNote(): ?Note {
        return $this->note ?? null;
    }

    public function getNumber(): ?int {
        return $this->number ?? null;
    }

    public function getOrder(): ?Order {
        return $this->order ?? null;
    }

    public function isOutbox(): bool {
        return $this->outbox ?? false;
    }

    public function getOutboxDate(): ?DateTime {
        return $this->outbox_date ?? null;
    }

    public function isOutboxParked(): bool {
        return $this->outbox_parked ?? false;
    }

    public function getPriority(): ?int {
        return $this->priority ?? null;
    }

    public function getPropertyTemplate(): ?PropertyTemplate {
        return $this->property_template ?? null;
    }

    public function isReadOnly(): bool {
        return $this->read_only ?? false;
    }

    public function getReceiptDate(): ?DateTime {
        return $this->receipt_date ?? null;
    }

    public function getReceiptNumber(): ?int {
        return $this->receipt_number ?? null;
    }

    public function isReferenceFile(): bool {
        return $this->reference_file ?? false;
    }

    public function getRegister(): ?Register {
        return $this->register ?? null;
    }

    public function getRevisionUser(): ?string {
        return $this->revision_user ?? null;
    }

    public function getSecureArea(): ?SecureArea {
        return $this->secure_area ?? null;
    }

    public function getState(): ?State {
        return $this->state ?? null;
    }

    public function getStructureItems(): ?StructureItems {
        return $this->structure_items ?? null;
    }

    public function getUser(): ?User {
        return $this->user ?? null;
    }

    public function getYear(): ?int {
        return $this->year ?? null;
    }

    protected function getArray(bool $asStringValues = false, bool $dateAsStringValues = true, string $dateFormat = "Y-m-d\TH:i:s"): array {
        return parent::getArray($asStringValues, $dateAsStringValues, $dateFormat);
    }
}
