<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : FeeVersionTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\FeeVersions\FeeVersion;
use Datev\Entities\Law\FeeVersions\FeeVersions;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class FeeVersionTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFeeVersion(): void {
        $data = [
            "id" => 1,
            "name" => "RVG 2021"
        ];

        $feeVersion = new FeeVersion($data, $this->logger);

        $this->assertInstanceOf(FeeVersion::class, $feeVersion);
        $this->assertEquals(1, $feeVersion->getId());
        $this->assertEquals("RVG 2021", $feeVersion->getName());
    }

    public function testCreateFeeVersions(): void {
        $data = [
            "content" => [
                [
                    "id" => 1,
                    "name" => "RVG 2021"
                ],
                [
                    "id" => 2,
                    "name" => "RVG 2024"
                ]
            ]
        ];

        $feeVersions = new FeeVersions($data, $this->logger);

        $this->assertInstanceOf(FeeVersions::class, $feeVersions);
        $this->assertCount(2, $feeVersions);
    }
}
