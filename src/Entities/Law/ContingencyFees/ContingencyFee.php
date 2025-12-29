<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ContingencyFee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Law\ContingencyFees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Psr\Log\LoggerInterface;

class ContingencyFee extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?ContingencyFeeID $id;
    protected ?string $object_type;
    protected ?float $unit_rate;
    protected ?string $note;
    protected ?string $document_currency;
    protected ?DateTime $valid_from;
    protected ?string $expense_type_id;
    protected ?string $file_id;
    protected ?string $file_link;
    protected ?string $client_id;
    protected ?string $client_link;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?ContingencyFeeID {
        return $this->id ?? null;
    }

    public function getObjectType(): ?string {
        return $this->object_type ?? null;
    }

    public function getUnitRate(): ?float {
        return $this->unit_rate ?? null;
    }

    public function getNote(): ?string {
        return $this->note ?? null;
    }

    public function getDocumentCurrency(): ?string {
        return $this->document_currency ?? null;
    }

    public function getValidFrom(): ?DateTime {
        return $this->valid_from ?? null;
    }

    public function getExpenseTypeId(): ?string {
        return $this->expense_type_id ?? null;
    }

    public function getFileId(): ?string {
        return $this->file_id ?? null;
    }

    public function getFileLink(): ?string {
        return $this->file_link ?? null;
    }

    public function getClientId(): ?string {
        return $this->client_id ?? null;
    }

    public function getClientLink(): ?string {
        return $this->client_link ?? null;
    }
}
