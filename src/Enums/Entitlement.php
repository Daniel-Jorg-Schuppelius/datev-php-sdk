<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : Entitlement.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum Entitlement: string {
    case IamUser = 'IamUser';
    case IamAdministrator = 'IamAdministrator';
    case PomAdministrator = 'PomAdministrator';
    case IdmAdministrator = 'IdmAdministrator';
    case IdmAndPomSelfAdministrator = 'IdmAndPomSelfAdministrator';
}
