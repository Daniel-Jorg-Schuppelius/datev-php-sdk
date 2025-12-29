<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ScimFilterTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\IdentityAndAccessManagement;

use Datev\Entities\IdentityAndAccessManagement\ServiceProvider\ScimFilter;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class ScimFilterTest extends TestCase {
    public function testCreateScimFilter(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "supported" => true,
            "max_results" => 500
        ];

        $filter = new ScimFilter($data, $logger);

        $this->assertInstanceOf(ScimFilter::class, $filter);
        $this->assertTrue($filter->isSupported());
        $this->assertEquals(500, $filter->getMaxResults());
    }

    public function testUnsupportedScimFilter(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "supported" => false
        ];

        $filter = new ScimFilter($data, $logger);

        $this->assertFalse($filter->isSupported());
    }
}
