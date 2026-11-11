<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StructureItemDocumentFileID.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\StructureItems;

use Datev\Entities\DocumentManagement\Documents\Files\DocumentFileID;
use Psr\Log\LoggerInterface;

/**
 * Verweis eines Strukturelements auf seine Datei (GET /document-files/{id}).
 * Der Feldname als entityName sorgt dafür, dass toArray() den Wert flach ausgibt.
 */
class StructureItemDocumentFileID extends DocumentFileID {
    /**
     * @param mixed $data
     */
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
        $this->entityName = 'document_file_id';
    }
}
