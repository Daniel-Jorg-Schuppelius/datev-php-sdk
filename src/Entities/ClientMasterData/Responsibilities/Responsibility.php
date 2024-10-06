<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Responsibility.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Entities\ClientMasterData\Responsibilities;

use APIToolkit\Contracts\Abstracts\NamedEntity;
use APIToolkit\Contracts\Interfaces\NamedEntityInterfaces\IdentifiableNamedEntityInterface;
use APIToolkit\Entities\GUID;
use Datev\Enums\Status;
use Psr\Log\LoggerInterface;

class Responsibility extends NamedEntity implements IdentifiableNamedEntityInterface {
    protected ?ResponsibilityID $id;
    protected ?AreaOfResponsibilityID $area_of_responsibility_id;
    protected ?string $area_of_responsibility_name;
    protected ?GUID $employee_id;
    protected ?string $employee_display_name;
    protected ?int $employee_number;
    protected ?bool $employee_status;
    protected ?GUID $client_id;
    protected ?string $client_name;
    protected ?int $client_number;
    protected ?Status $client_status;

    public function __construct($data = null, ?LoggerInterface $logger = null) {
        parent::__construct($data, $logger);
    }

    public function getID(): ResponsibilityID {
        return $this->id;
    }
}
