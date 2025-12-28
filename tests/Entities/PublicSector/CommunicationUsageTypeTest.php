<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CommunicationUsageTypeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\PublicSector;

use Datev\Entities\PublicSector\TransactionCommunications\CommunicationUsageType;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class CommunicationUsageTypeTest extends TestCase {
    public function testCreateCommunicationUsageType(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => 1,
            "name" => "Email",
            "description" => "E-Mail-Kommunikation"
        ];

        $usageType = new CommunicationUsageType($data, $logger);

        $this->assertInstanceOf(CommunicationUsageType::class, $usageType);
    }
}
