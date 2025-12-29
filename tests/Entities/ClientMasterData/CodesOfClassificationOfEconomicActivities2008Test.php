<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CodesOfClassificationOfEconomicActivities2008Test.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2008\CodeOfClassificationOfEconomicActivities2008;
use Datev\Entities\ClientMasterData\CodesOfClassificationOfEconomicActivities2008\CodesOfClassificationOfEconomicActivities2008;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CodesOfClassificationOfEconomicActivities2008Test extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["current_code_of_classification_of_economic_activities_2008" => "62.01"],
                ["current_code_of_classification_of_economic_activities_2008" => "62.02"]
            ]
        ];

        $codes = new CodesOfClassificationOfEconomicActivities2008($data, $this->logger);

        $this->assertCount(2, $codes->getValues());
        $this->assertInstanceOf(CodeOfClassificationOfEconomicActivities2008::class, $codes->getValues()[0]);
    }
}
