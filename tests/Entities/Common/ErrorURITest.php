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
use Tests\Contracts\EntityTest;

class ErrorURITest extends EntityTest {
    public function test_create_from_string(): void {
        $url = "https://docs.datev.de/errors/404";
        $errorUri = new ErrorURI($url);

        $this->assertEquals($url, $errorUri->getValue());
        $this->assertEquals('error_uri', $errorUri->getEntityName());
    }

    public function test_is_valid(): void {
        $errorUri = new ErrorURI("https://docs.datev.de/errors/400");
        $this->assertTrue($errorUri->isValid());
    }
}
