<?php
/*
 * Created on   : Sun Nov 03 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CostCenterProperty.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Accounting\CostCenterProperties;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\Accounting\CostCenterPropertyCharacteristics\ID\CostCenterPropertyCharacteristicID;
use Psr\Log\LoggerInterface;

class CostCenterProperty extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected CostCenterPropertyID $id;
    protected ?CostCenterPropertyCharacteristicID $characteristic_id;
    protected ?string $description;

    /**
     * @param array<string, mixed>|object|null $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): CostCenterPropertyID {
        return $this->id;
    }
}
