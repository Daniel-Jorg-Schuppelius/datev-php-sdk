<?php
/*
 * Created on   : Sun Jan 26 2025
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Clients.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\Common\Clients;

use APIToolkit\Contracts\Abstracts\NamedValues;
use Psr\Log\LoggerInterface;

/**
 * @extends NamedValues<Client>
 */
class Clients extends NamedValues {
    public function __construct($data = null, ?LoggerInterface $logger = null) {
        $this->entityName = "content";
        if (empty($this->valueClassName) || (!is_subclass_of($this->valueClassName, Client::class) && $this->valueClassName !== Client::class)) {
            $this->valueClassName = Client::class;
        }

        parent::__construct($data, $logger);
    }
}
