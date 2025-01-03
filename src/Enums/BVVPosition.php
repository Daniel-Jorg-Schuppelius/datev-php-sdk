<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BVVPosition.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums;

enum BVVPosition: int {
    case CapitalAdjustment = 1;
    case WithdrawalDistribution = 2;
    case CapitalContribution = 3;
    case Transfer6bReserve = 4;
    case Transfer = 5;
}
