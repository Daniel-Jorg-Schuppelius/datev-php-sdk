<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : JobTitleTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\JobTitles\JobTitle;
use Datev\Entities\ClientMasterData\JobTitles\JobTitles;

class JobTitleTest extends EntityTest {
    public function testCreateJobTitle() {
        $data = [
            "value" => "Geschäftsführer",
            "valid_from" => "2024-01-01"
        ];

        $title = new JobTitle($data);
        $this->assertInstanceOf(JobTitle::class, $title);
    }

    public function testCreateJobTitles() {
        $data = [
            [
                "value" => "Geschäftsführer",
                "valid_from" => "2024-01-01"
            ]
        ];

        $titles = new JobTitles($data);
        $this->assertInstanceOf(JobTitles::class, $titles);
    }
}
