<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalFormType.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum LegalFormType: int {
    case Einzelunternehmen = 1;
    case Personengesellschaft = 2;
    case Kapitalgesellschaft = 3;
    case Sonderform = 4;
}
