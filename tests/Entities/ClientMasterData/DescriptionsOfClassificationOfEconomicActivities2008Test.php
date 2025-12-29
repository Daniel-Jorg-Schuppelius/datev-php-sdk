<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DescriptionsOfClassificationOfEconomicActivities2008Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2008\DescriptionsOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\DescriptionsOfClassificationOfEconomicActivities2008\DescriptionOfClassificationOfEconomicActivities2008;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DescriptionsOfClassificationOfEconomicActivities2008Test extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_description_of_classification_of_economic_activities_2008" => "Erbringung von IT-Dienstleistungen"],
                ["current_description_of_classification_of_economic_activities_2008" => "Softwareentwicklung"]
            ]
        ];

        $descriptions = new DescriptionsOfClassificationOfEconomicActivities2008($data, $this->logger);

        $this->assertCount(2, $descriptions->getValues());
        $this->assertInstanceOf(DescriptionOfClassificationOfEconomicActivities2008::class, $descriptions->getValues()[0]);
    }
}
