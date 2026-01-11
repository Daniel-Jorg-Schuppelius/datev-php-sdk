<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : SucceededResponseTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Payroll;

use Tests\Contracts\EntityTest;

use Datev\Entities\Payroll\BatchResponse\Succeeded\SucceededResponse;
use Datev\Entities\Payroll\BatchResponse\Succeeded\SucceededResponses;

class SucceededResponseTest extends EntityTest {
    public function testCreateSucceededResponse(): void {
        $data = [
            "index" => 0,
            "created_id" => "12345678"
        ];

        $response = new SucceededResponse($data);

        $this->assertInstanceOf(SucceededResponse::class, $response);
    }

    public function testCreateSucceededResponses(): void {
        $data = [
            [
                "index" => 0,
                "created_id" => "12345678"
            ],
            [
                "index" => 1,
                "created_id" => "87654321"
            ]
        ];

        $responses = new SucceededResponses($data);

        $this->assertInstanceOf(SucceededResponses::class, $responses);
        $this->assertCount(2, $responses->getValues());
    }
}
