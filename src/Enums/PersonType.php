<?php

declare(strict_types=1);

namespace Datev\Enums;

enum PersonType: string {
    case Legal = "legal_person";
    case Natural = "natural_person";
}
