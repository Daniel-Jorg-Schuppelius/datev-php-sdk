<?php
/*
 * Created on   : Sat Nov 02 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenItem.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\OpenItems;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use DateTime;
use Datev\Entities\Common\VariousAddressID;
use Datev\Enums\PaymentMethod;
use Psr\Log\LoggerInterface;

class OpenItem extends NamedEntity {
    protected ?int $assessment_year;
    protected ?DateTime $assigned_due_date;
    protected ?int $business_partner_bank_position;
    protected ?int $circumstance_type;
    protected ?DateTime $due_date;
    protected ?bool $has_dunning_block;
    protected ?bool $has_interest_block;
    protected ?PaymentMethod $payment_method;
    protected ?string $receivable_type_id;
    protected ?VariousAddressID $various_address_id;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }
}
