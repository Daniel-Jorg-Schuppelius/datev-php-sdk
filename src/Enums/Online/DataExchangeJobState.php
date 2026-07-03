<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DataExchangeJobState.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Datev\Enums\Online;

/**
 * Status eines Export-Jobs im Accounting Data Exchange.
 */
enum DataExchangeJobState: string {
    case Pending = 'PENDING';
    case Completed = 'COMPLETED';
    case Failed = 'FAILED';
    case Deleted = 'DELETED';

    public function isTerminal(): bool {
        return $this !== self::Pending;
    }
}
