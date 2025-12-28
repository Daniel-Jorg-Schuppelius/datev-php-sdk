<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : BillingCategoryTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Law;

use Datev\Entities\Law\BillingCategories\BillingCategory;
use Datev\Entities\Law\BillingCategories\BillingCategories;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class BillingCategoryTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateBillingCategory(): void {
        $data = [
            "number" => 1,
            "name" => "Standard-Abrechnung"
        ];

        $billingCategory = new BillingCategory($data, $this->logger);

        $this->assertInstanceOf(BillingCategory::class, $billingCategory);
        $this->assertEquals(1, $billingCategory->getNumber());
        $this->assertEquals("Standard-Abrechnung", $billingCategory->getName());
    }

    public function testCreateBillingCategories(): void {
        $data = [
            "content" => [
                [
                    "number" => 1,
                    "name" => "Standard-Abrechnung"
                ],
                [
                    "number" => 2,
                    "name" => "Zusatzleistungen"
                ]
            ]
        ];

        $billingCategories = new BillingCategories($data, $this->logger);

        $this->assertInstanceOf(BillingCategories::class, $billingCategories);
        $this->assertCount(2, $billingCategories);
    }
}
