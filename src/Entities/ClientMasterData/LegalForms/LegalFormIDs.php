<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalFormIDs.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\LegalForms;

use APIToolkit\Contracts\Abstracts\NamedValues;
use DateTime;
use Psr\Log\LoggerInterface;

/**
 * @extends NamedValues<LegalFormID>
 */
class LegalFormIDs extends NamedValues {
    /**
     * @param mixed $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = LegalFormID::class;

        parent::__construct($data, $logger);
    }

    /**
     * @return array<array-key, mixed>
     */
    public function toArray(bool $fullEntity = true, string $dateFormat = DateTime::RFC3339_EXTENDED): array {
        $result = [];
        if ($fullEntity) {
            // Die Collection ist auf LegalFormID festgelegt (@extends
            // NamedValues<LegalFormID>, valueClassName im Konstruktor) — eine
            // Typunterscheidung wie in DateTimeNamedValues, wo der Elementtyp
            // offen ist, hätte hier keinen erreichbaren Zweig.
            foreach ($this->values as $value) {
                $result[] = $value->toArray($fullEntity, $dateFormat);
            }
        } else {
            $result = parent::toArray();
        }
        return $result;
    }
}
