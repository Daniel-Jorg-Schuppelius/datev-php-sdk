<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ContactPerson.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\ContactPersons;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use Datev\Entities\ClientMasterData\Addressees\ID\AddresseeID;
use Psr\Log\LoggerInterface;

class ContactPerson extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?ContactPersonID $id;
    protected ?AddresseeID $addressee_id;
    protected ?string $department;
    protected ?string $display_name;
    protected ?string $function;
    protected string $note;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ContactPersonID {
        return $this->id;
    }
}
