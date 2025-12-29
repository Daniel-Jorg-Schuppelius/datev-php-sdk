<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ErrorURITest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\Errors\ErrorURI;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class ErrorURITest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromString(): void {
        $url = "https://docs.datev.de/errors/404";
        $errorUri = new ErrorURI($url, $this->logger);

        $this->assertEquals($url, $errorUri->getValue());
        $this->assertEquals('error_uri', $errorUri->getEntityName());
    }

    public function testIsValid(): void {
        $errorUri = new ErrorURI("https://docs.datev.de/errors/400", $this->logger);
        $this->assertTrue($errorUri->isValid());
    }
}
