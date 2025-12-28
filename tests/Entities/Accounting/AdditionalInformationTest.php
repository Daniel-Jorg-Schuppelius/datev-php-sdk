<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdditionalInformationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AdditionalInformations\AdditionalInformation;
use Datev\Entities\Accounting\AdditionalInformations\AdditionalInformations;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class AdditionalInformationTest extends TestCase {
    private ?LoggerInterface $logger = null;

    public function __construct(string $name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateAdditionalInformation(): void {
        $data = [
            "additional_information_type" => "COMMENT",
            "additional_information_content" => "Testkommentar zur Buchung"
        ];

        $additionalInformation = new AdditionalInformation($data, $this->logger);

        $this->assertInstanceOf(AdditionalInformation::class, $additionalInformation);
    }

    public function testCreateAdditionalInformations(): void {
        $data = [
            "content" => [
                [
                    "additional_information_type" => "COMMENT",
                    "additional_information_content" => "Kommentar 1"
                ],
                [
                    "additional_information_type" => "NOTE",
                    "additional_information_content" => "Notiz 2"
                ]
            ]
        ];

        $additionalInformations = new AdditionalInformations($data, $this->logger);

        $this->assertInstanceOf(AdditionalInformations::class, $additionalInformations);
        $this->assertCount(2, $additionalInformations);
    }
}
