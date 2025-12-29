<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ContactPersonsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\ContactPersons\ContactPersons;
use Datev\Entities\ClientMasterData\ContactPersons\ContactPerson;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ContactPersonsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "cp-1",
                    "display_name" => "Hans Meyer",
                    "department" => "Buchhaltung"
                ],
                [
                    "id" => "cp-2",
                    "display_name" => "Anna Schmidt",
                    "department" => "Vertrieb"
                ]
            ]
        ];

        $contactPersons = new ContactPersons($data, $this->logger);

        $this->assertCount(2, $contactPersons->getValues());
        $this->assertInstanceOf(ContactPerson::class, $contactPersons->getValues()[0]);
    }
}
