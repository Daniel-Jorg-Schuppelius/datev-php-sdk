<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EchoResponse.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Diagnostics\EchoResponse;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Psr\Log\LoggerInterface;

class EchoResponse extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected EchoResponseID $id;
    protected string $echo_message;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): EchoResponseID {
        return $this->id;
    }

    public function getEchoMessage(): ?string {
        return $this->echo_message ?? null;
    }
}
