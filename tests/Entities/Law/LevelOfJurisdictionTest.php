<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LevelOfJurisdictionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\LevelsOfJurisdiction\LevelOfJurisdiction;
use Datev\Entities\Law\LevelsOfJurisdiction\LevelsOfJurisdiction;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class LevelOfJurisdictionTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateLevelOfJurisdiction(): void {
        $data = [
            "id" => "test-id",
            "name" => "Landgericht"
        ];

        $levelOfJurisdiction = new LevelOfJurisdiction($data, $this->logger);

        $this->assertInstanceOf(LevelOfJurisdiction::class, $levelOfJurisdiction);
        $this->assertEquals("Landgericht", $levelOfJurisdiction->getName());
    }

    public function testCreateLevelsOfJurisdiction(): void {
        $data = [
            "content" => [
                [
                    "id" => "test-id-1",
                    "name" => "Amtsgericht"
                ],
                [
                    "id" => "test-id-2",
                    "name" => "Landgericht"
                ]
            ]
        ];

        $levelsOfJurisdiction = new LevelsOfJurisdiction($data, $this->logger);

        $this->assertInstanceOf(LevelsOfJurisdiction::class, $levelsOfJurisdiction);
        $this->assertCount(2, $levelsOfJurisdiction);
    }
}
