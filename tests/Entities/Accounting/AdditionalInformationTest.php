<?php
/*
 * Created on   : Sat Dec 27 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AdditionalInformationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\Accounting;

use Datev\Entities\Accounting\AdditionalInformations\{AdditionalInformation, AdditionalInformations};
use Tests\Contracts\EntityTest;

class AdditionalInformationTest extends EntityTest {
    public function test_create_additional_information(): void {
        $data = [
            "additional_information_type" => "COMMENT",
            "additional_information_content" => "Testkommentar zur Buchung",
        ];

        $additionalInformation = new AdditionalInformation($data);

        $this->assertInstanceOf(AdditionalInformation::class, $additionalInformation);
    }

    public function test_create_additional_informations(): void {
        $data = [
            "content" => [
                [
                    "additional_information_type" => "COMMENT",
                    "additional_information_content" => "Kommentar 1",
                ],
                [
                    "additional_information_type" => "NOTE",
                    "additional_information_content" => "Notiz 2",
                ],
            ],
        ];

        $additionalInformations = new AdditionalInformations($data);

        $this->assertInstanceOf(AdditionalInformations::class, $additionalInformations);
        $this->assertCount(2, $additionalInformations);
    }
}
