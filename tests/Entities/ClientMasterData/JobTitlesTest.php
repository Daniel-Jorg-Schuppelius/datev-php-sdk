<?php

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Datev\Entities\ClientMasterData\JobTitles\JobTitles;
use Datev\Entities\ClientMasterData\JobTitles\JobTitle;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class JobTitlesTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromArray(): void {
        $data = [
            "content" => [
                ["id" => "jt-1", "title" => "Manager"],
                ["id" => "jt-2", "title" => "Director"]
            ]
        ];
        $collection = new JobTitles($data, $this->logger);
        $this->assertCount(2, $collection->getValues());
        $this->assertInstanceOf(JobTitle::class, $collection->getValues()[0]);
    }
}
