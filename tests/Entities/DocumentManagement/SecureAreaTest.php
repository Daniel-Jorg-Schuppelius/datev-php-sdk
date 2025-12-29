<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SecureAreaTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\SecureAreas\SecureArea;
use Datev\Entities\DocumentManagement\SecureAreas\SecureAreas;
use Datev\Entities\DocumentManagement\SecureAreas\SecureAreaID;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class SecureAreaTest extends TestCase {
    public function testCreateSecureArea(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "id" => "secure-001",
            "name" => "Vertrauliche Dokumente"
        ];

        $secureArea = new SecureArea($data, $logger);

        $this->assertInstanceOf(SecureArea::class, $secureArea);
        $this->assertInstanceOf(SecureAreaID::class, $secureArea->getID());
        $this->assertEquals("secure-001", $secureArea->getID()->getValue());
        $this->assertEquals("Vertrauliche Dokumente", $secureArea->getName());
    }

    public function testCreateSecureAreas(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "id" => "secure-001",
                    "name" => "Vertrauliche Dokumente"
                ],
                [
                    "id" => "secure-002",
                    "name" => "Personaldaten"
                ]
            ]
        ];

        $secureAreas = new SecureAreas($data, $logger);

        $this->assertInstanceOf(SecureAreas::class, $secureAreas);
        $this->assertCount(2, $secureAreas);
        $this->assertInstanceOf(SecureArea::class, $secureAreas->getValues()[0]);
    }
}
