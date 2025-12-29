<?php

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartners;
use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartner;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CorrespondencePartnersTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["domain" => "clients", "link" => "https://api.datev.de/clients/123"],
                ["domain" => "vendors", "link" => "https://api.datev.de/vendors/456"]
            ]
        ];
        $collection = new CorrespondencePartners($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(CorrespondencePartner::class, $collection->getValues()[0]);
    }
}
