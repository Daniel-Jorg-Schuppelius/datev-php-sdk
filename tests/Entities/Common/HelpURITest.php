<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HelpURITest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\HelpURI;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class HelpURITest extends TestCase {
    public function testCreateHelpURI(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $helpURI = new HelpURI("https://developer.datev.de/help/api", $logger);

        $this->assertInstanceOf(HelpURI::class, $helpURI);
        $this->assertEquals("https://developer.datev.de/help/api", $helpURI->getValue());
    }
}
