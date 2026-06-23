<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AcknowledgementUserTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\AcknowledgementUsers\{AcknowledgementUser, AcknowledgementUserID, AcknowledgementUsers};
use Tests\Contracts\EntityTest;

class AcknowledgementUserTest extends EntityTest {
    public function test_create_acknowledgement_user(): void {
        $data = [
            "id" => "550e8400-e29b-41d4-a716-446655440000",
            "name" => "Max Mustermann",
            "is_deleted" => false,
        ];

        $acknowledgementUser = new AcknowledgementUser($data);

        $this->assertInstanceOf(AcknowledgementUser::class, $acknowledgementUser);
        $this->assertInstanceOf(AcknowledgementUserID::class, $acknowledgementUser->getID());
        $this->assertEquals("550e8400-e29b-41d4-a716-446655440000", $acknowledgementUser->getID()->getValue());
        $this->assertEquals("Max Mustermann", $acknowledgementUser->getName());
        $this->assertFalse($acknowledgementUser->isDeleted());
    }

    public function test_create_acknowledgement_users(): void {
        $data = [
            "content" => [
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440000",
                    "name" => "Max Mustermann",
                    "is_deleted" => false,
                ],
                [
                    "id" => "550e8400-e29b-41d4-a716-446655440001",
                    "name" => "Erika Musterfrau",
                    "is_deleted" => false,
                ],
            ],
        ];

        $acknowledgementUsers = new AcknowledgementUsers($data);

        $this->assertInstanceOf(AcknowledgementUsers::class, $acknowledgementUsers);
        $this->assertCount(2, $acknowledgementUsers);
        $this->assertInstanceOf(AcknowledgementUser::class, $acknowledgementUsers->getValues()[0]);
    }
}
