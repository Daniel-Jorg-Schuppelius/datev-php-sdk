<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : LegalFormsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\LegalForms\LegalForms;
use Datev\Entities\ClientMasterData\LegalForms\LegalForm;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class LegalFormsTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                [
                    "id" => "lf-1",
                    "short_name" => "GmbH",
                    "long_name" => "Gesellschaft mit beschränkter Haftung"
                ],
                [
                    "id" => "lf-2",
                    "short_name" => "AG",
                    "long_name" => "Aktiengesellschaft"
                ]
            ]
        ];

        $legalForms = new LegalForms($data, $this->logger);

        $this->assertCount(2, $legalForms->getValues());
        $this->assertInstanceOf(LegalForm::class, $legalForms->getValues()[0]);
    }
}
