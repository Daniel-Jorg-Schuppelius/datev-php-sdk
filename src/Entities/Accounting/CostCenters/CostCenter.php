<?php
/*
 * Created on   : Sun Nov 03 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenter.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostCenters;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use DateTime;
use Datev\Entities\Accounting\CostCenterProperties\CostCenterProperties;
use Datev\Entities\Accounting\CostRates\CostRates;
use Datev\Entities\Common\EmailAddress;
use Psr\Log\LoggerInterface;

class CostCenter extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?CostCenterID $id;
    protected ?CostCenterProperties $properties;
    protected ?CostRates $cost_rates;
    protected ?DateTime $creation_date;
    protected ?DateTime $date_last_modification;
    protected EmailAddress $email;
    protected ?string $long_name;
    protected ?string $note;
    protected ?string $short_name;
    protected ?DateTime $postable_from;
    protected ?DateTime $postable_to;
    protected ?string $reference_value;
    protected ?string $responsible;
    protected ?string $city_code;
    protected ?string $city;
    protected ?string $street;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CostCenterID {
        return $this->id;
    }
}
