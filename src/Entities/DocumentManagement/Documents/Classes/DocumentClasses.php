<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Documents\Classes;

use APIToolkit\Contracts\Abstracts\NamedValues;
use APIToolkit\Contracts\Interfaces\NamedEntityInterface;
use Psr\Log\LoggerInterface;

class DocumentClasses extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        $this->valueClassName = DocumentClass::class;

        parent::__construct($data, $logger);
    }

    public function setData($data): NamedEntityInterface {
        if (is_array($data) && $this->isArrayOfNumericValues($data)) {
            $this->values = [];

            foreach ($data as $value) {
                $this->values[] = new $this->valueClassName(["id" => $value], $this->logger);
            }
        } else {
            parent::setData($data);
        }

        return $this;
    }
}
