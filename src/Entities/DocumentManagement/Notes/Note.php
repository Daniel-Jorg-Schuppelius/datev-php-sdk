<?php

declare(strict_types=1);

namespace Datev\Entities\DocumentManagement\Notes;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use Psr\Log\LoggerInterface;

class Note extends NamedEntity {
    protected ?string $text;
    protected ?bool $popup;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getText(): ?string {
        return $this->text ?? null;
    }

    public function getPopup(): ?bool {
        return $this->popup ?? null;
    }
}
