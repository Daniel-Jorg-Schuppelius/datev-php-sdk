<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdvancePayment.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\AdvancePayments;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Datev\Enums\AdvancePaymentRecordType;
use Psr\Log\LoggerInterface;

class AdvancePayment extends NamedEntity {
    protected ?string $eu_member_state;
    protected ?float $eu_tax_rate;
    protected string $order_number;
    protected ?AdvancePaymentRecordType $record_type;
    protected ?int $revenue_account;
    protected ?int $tax_key;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
