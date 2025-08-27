<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Sequence.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\Sequences;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\Accounting\Records\Records;
use Datev\Enums\AccountingReason;
use Datev\Enums\AccountingRecordType;
use Psr\Log\LoggerInterface;

class SequenceRead extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?SequenceID $id;
    protected ?AccountingReason $accounting_reason;
    protected ?string $application_information;
    protected DateTime $date_from;
    protected DateTime $date_to;
    protected ?string $description;
    protected ?string $initials;
    protected ?bool $is_committed;
    protected ?AccountingRecordType $record_type;
    protected ?Records $accounting_records;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): SequenceID {
        return $this->id;
    }
}
