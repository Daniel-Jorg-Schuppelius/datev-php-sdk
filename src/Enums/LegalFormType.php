<?php

declare(strict_types=1);

namespace Datev\Enums;

enum LegalFormType: int {
    case Einzelunternehmen = 1;
    case Personengesellschaft = 2;
    case Kapitalgesellschaft = 3;
    case Sonderform = 4;
}
