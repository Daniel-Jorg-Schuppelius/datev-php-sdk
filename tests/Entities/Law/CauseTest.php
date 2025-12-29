<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CauseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use ERRORToolkit\Logger\ConsoleLogger;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\Law\Causes\Cause;
use Datev\Entities\Law\Causes\Causes;
use PHPUnit\Framework\TestCase;

class CauseTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateCause() {
        $data = [
            "id" => "c1234567-8901-2345-6789-012345678901",
            "name" => "Rechtsstreit Müller",
            "departments" => ["Zivilrecht", "Arbeitsrecht"]
        ];

        $cause = new Cause($data, $this->logger);
        $this->assertInstanceOf(Cause::class, new Cause());
        $this->assertInstanceOf(Cause::class, $cause);
        $this->assertEquals("Rechtsstreit Müller", $cause->getName());
        $this->assertIsArray($cause->getDepartments());
    }

    public function testCreateCauses() {
        $data = [
            "content" => [
                [
                    "id" => "c1234567-8901-2345-6789-012345678901",
                    "name" => "Fall 1"
                ],
                [
                    "id" => "c2234567-8901-2345-6789-012345678902",
                    "name" => "Fall 2"
                ]
            ]
        ];

        $causes = new Causes($data, $this->logger);
        $this->assertInstanceOf(Causes::class, $causes);
        $this->assertCount(2, $causes->getValues());
    }
}
