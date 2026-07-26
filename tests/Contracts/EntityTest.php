<?php
/*
 * Created on   : Sat Jan 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : EntityTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Contracts;

use ERRORToolkit\Traits\ErrorLog;
use PHPUnit\Framework\TestCase;
use Tests\TestAPIClientFactory;

abstract class EntityTest extends TestCase {
    use ErrorLog;

    protected function setUp(): void {
        parent::setUp();
        self::setLogger(TestAPIClientFactory::getLogger());
    }
}
