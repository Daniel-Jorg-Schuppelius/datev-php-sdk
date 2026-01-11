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

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\HelpURI;

class HelpURITest extends EntityTest {
    public function testCreateHelpURI(): void {
        $helpURI = new HelpURI("https://developer.datev.de/help/api");

        $this->assertInstanceOf(HelpURI::class, $helpURI);
        $this->assertEquals("https://developer.datev.de/help/api", $helpURI->getValue());
    }
}
