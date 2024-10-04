<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\DocumentManagement\Domains\Domain;
use PHPUnit\Framework\TestCase;

class DomainTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateDocument() {
        $data = [
            "correspondence_partner" => [
                "domain" => "Mandant",
                "link" => "http://localhost:58454/datev/api/master-data/v1/clients"
            ],
            "folders" => [
                [
                    "name" => "Stammakte",
                    "registers" => [
                        [
                            "name" => "Korrespondenz",
                            "id" => "2"
                        ]
                    ],
                    "id" => "3"
                ]
            ],
            "is_selected" => "true",
            "name" => "Mandant",
            "id" => "1"
        ];

        $domain = new Domain($data, $this->logger);
        $this->assertTrue($domain->isValid());
        $this->assertInstanceOf(Domain::class, new Domain());
        $this->assertInstanceOf(Domain::class, $domain);
        $this->assertEquals($data, $domain->toArray());
        $this->assertEquals('1', $domain->getID()->getValue());
    }
}