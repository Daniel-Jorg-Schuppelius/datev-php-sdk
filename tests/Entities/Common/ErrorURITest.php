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

use Tests\Contracts\EntityTest;

use Datev\Entities\Common\Errors\ErrorURI;

class ErrorURITest extends EntityTest {
    public function testCreateFromString(): void {
        $url = "https://docs.datev.de/errors/404";
        $errorUri = new ErrorURI($url);

        $this->assertEquals($url, $errorUri->getValue());
        $this->assertEquals('error_uri', $errorUri->getEntityName());
    }

    public function testIsValid(): void {
        $errorUri = new ErrorURI("https://docs.datev.de/errors/400");
        $this->assertTrue($errorUri->isValid());
    }
}
