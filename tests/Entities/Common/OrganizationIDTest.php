<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OrganizationIDTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\OrganizationID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class OrganizationIDTest extends TestCase {
    public function testCreateOrganizationID(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $organizationID = new OrganizationID("550e8400-e29b-41d4-a716-446655440002", $logger);

        $this->assertInstanceOf(OrganizationID::class, $organizationID);
        $this->assertEquals("550e8400-e29b-41d4-a716-446655440002", $organizationID->getValue());
    }
}
