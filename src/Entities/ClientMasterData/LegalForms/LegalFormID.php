<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalFormID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\LegalForms;

use APIToolkit\Entities\ID;
use DateTime;
use Psr\Log\LoggerInterface;

class LegalFormID extends ID {
    protected ?DateTime $valid_from;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        if (is_array($data)) {
            $this->valid_from = array_key_exists('valid_from', $data) ? new DateTime($data['valid_from']) : null;

            if (array_key_exists('value', $data)) {
                parent::__construct($data['value'], $logger);
            } else {
                parent::__construct(null, $logger);
            }
        } else {
            parent::__construct($data, $logger);
        }
        $this->entityName = 'id';
    }

    public function getValidFrom(): ?DateTime {
        return $this->valid_from ?? null;
    }

    public function isValid(): bool {
        return !is_null($this->value) && ($this->valid_from === null || $this->valid_from <= new DateTime());
    }

    public function toArray(bool $fullEntity = false, string $dateFormat = DateTime::RFC3339_EXTENDED): array {
        $result = [];

        if ($fullEntity) {
            $tempEntityName = $this->entityName;
            $this->entityName = 'value';
            $result = parent::toArray();
            $result['valid_from'] = $this->valid_from->format($dateFormat);
            $this->entityName = $tempEntityName;
        } else {
            $result = parent::toArray();
        }
        return $result;
    }
}
