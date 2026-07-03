<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DebitCreditIdentifier.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Soll-/Haben-Kennzeichen eines Belegtyps in accounting:documents.
 * (Die Online-API nutzt "debit"/"credit" statt der Desktop-Werte "S"/"H".)
 */
enum DebitCreditIdentifier: string {
    case Debit = 'debit';
    case Credit = 'credit';
}
