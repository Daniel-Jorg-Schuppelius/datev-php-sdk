<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdditionalMessage.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Common\AdditionalMessages;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use APIToolkit\Entities\Information\Link;
use Datev\Entities\Common\HelpURI;
use Psr\Log\LoggerInterface;

class AdditionalMessage extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?AdditionalMessageID $id;
    protected ?string $description;
    protected ?HelpURI $help_uri;
    protected ?string $severity;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ?AdditionalMessageID {
        return $this->id ?? null;
    }

    public function getDescription(): ?string {
        return $this->description ?? null;
    }

    public function getHelpUri(): ?Link {
        return $this->help_uri ?? null;
    }

    public function getSeverity(): ?string {
        return $this->severity ?? null;
    }
}
