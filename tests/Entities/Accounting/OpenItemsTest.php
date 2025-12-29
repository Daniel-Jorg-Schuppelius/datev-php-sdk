<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : OpenItemsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\OpenItems\OpenItems;
use Datev\Entities\Accounting\OpenItems\OpenItem;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class OpenItemsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "due_date" => "2024-02-15",
                    "assessment_year" => 2024,
                    "has_dunning_block" => false
                ],
                [
                    "due_date" => "2024-03-01",
                    "assessment_year" => 2024,
                    "has_dunning_block" => true
                ]
            ]
        ];

        $openItems = new OpenItems($data, $this->logger);

        $this->assertCount(2, $openItems->getValues());
        $this->assertInstanceOf(OpenItem::class, $openItems->getValues()[0]);
    }
}
