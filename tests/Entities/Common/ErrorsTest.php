<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : ErrorsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Common;

use Datev\Entities\Common\Errors\{Error, Errors};
use Tests\Contracts\EntityTest;

class ErrorsTest extends EntityTest {
    public function test_create_from_array(): void {
        $data = [
            "content" => [
                [
                    "error" => "validation_failed",
                    "error_description" => "Validation failed for email field",
                ],
                [
                    "error" => "required_field",
                    "error_description" => "Required field name is missing",
                ],
            ],
        ];

        $errors = new Errors($data);

        $this->assertCount(2, $errors->getValues());
        $this->assertInstanceOf(Error::class, $errors->getValues()[0]);
    }
}
