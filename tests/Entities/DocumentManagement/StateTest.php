<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : StateTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Tests\Contracts\EntityTest;

use Datev\Entities\DocumentManagement\States\State;
use Datev\Entities\DocumentManagement\States\States;
use Datev\Entities\DocumentManagement\States\StateID;

class StateTest extends EntityTest {
    public function testCreateState(): void {
        $data = [
            "id" => "state-001",
            "name" => "In Bearbeitung"
        ];

        $state = new State($data);

        $this->assertInstanceOf(State::class, $state);
        $this->assertInstanceOf(StateID::class, $state->getID());
        $this->assertEquals("state-001", $state->getID()->getValue());
        $this->assertEquals("In Bearbeitung", $state->getName());
    }

    public function testCreateStates(): void {
        $data = [
            "content" => [
                [
                    "id" => "state-001",
                    "name" => "In Bearbeitung"
                ],
                [
                    "id" => "state-002",
                    "name" => "Genehmigt"
                ]
            ]
        ];

        $states = new States($data);

        $this->assertInstanceOf(States::class, $states);
        $this->assertCount(2, $states);
        $this->assertInstanceOf(State::class, $states->getValues()[0]);
    }
}
