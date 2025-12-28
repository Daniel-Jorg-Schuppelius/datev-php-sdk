<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Fee.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\PublicSector\Fees;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Entities\PublicSector\Common\Location;
use Datev\Entities\PublicSector\Common\PaymentMethod;
use DateTime;
use Psr\Log\LoggerInterface;

class Fee extends NamedEntity {
    protected ?int $id;
    protected ?string $fee_name;
    protected ?string $type_name;
    protected ?string $type_shortname;
    protected ?string $reference_number;
    protected ?DateTime $start_date;
    protected ?DateTime $end_date;
    protected ?DateTime $date_from;
    protected ?DateTime $date_to;
    protected ?string $fee_type;
    protected ?string $invoice_recipient;
    protected ?string $comment;
    protected ?string $notification_address_id;
    protected ?string $notification_type;
    protected ?Location $location;
    protected ?PaymentMethod $payment_method;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?int {
        return $this->id ?? null;
    }

    public function getTypeName(): ?string {
        return $this->type_name ?? null;
    }

    public function getTypeShortname(): ?string {
        return $this->type_shortname ?? null;
    }

    public function getReferenceNumber(): ?string {
        return $this->reference_number ?? null;
    }

    public function getStartDate(): ?DateTime {
        return $this->start_date ?? null;
    }

    public function getEndDate(): ?DateTime {
        return $this->end_date ?? null;
    }

    public function getFeeName(): ?string {
        return $this->fee_name ?? null;
    }

    public function getFeeType(): ?string {
        return $this->fee_type ?? null;
    }

    public function getInvoiceRecipient(): ?string {
        return $this->invoice_recipient ?? null;
    }

    public function getComment(): ?string {
        return $this->comment ?? null;
    }

    public function getLocation(): ?Location {
        return $this->location ?? null;
    }

    public function getPaymentMethod(): ?PaymentMethod {
        return $this->payment_method ?? null;
    }
}
