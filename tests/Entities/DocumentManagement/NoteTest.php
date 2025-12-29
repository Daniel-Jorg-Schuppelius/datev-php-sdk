<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : NoteTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\Notes\Note;
use Datev\Entities\DocumentManagement\Notes\Notes;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;

class NoteTest extends TestCase {
    public function testCreateNote(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "text" => "Bitte überprüfen Sie die Belege",
            "popup" => true
        ];

        $note = new Note($data, $logger);

        $this->assertInstanceOf(Note::class, $note);
        $this->assertEquals("Bitte überprüfen Sie die Belege", $note->getText());
        $this->assertTrue($note->getPopup());
    }

    public function testCreateNotes(): void {
        $logger = ConsoleLoggerFactory::getLogger();

        $data = [
            "content" => [
                [
                    "text" => "Bitte überprüfen Sie die Belege",
                    "popup" => true
                ],
                [
                    "text" => "Dokument genehmigt",
                    "popup" => false
                ]
            ]
        ];

        $notes = new Notes($data, $logger);

        $this->assertInstanceOf(Notes::class, $notes);
        $this->assertCount(2, $notes);
        $this->assertInstanceOf(Note::class, $notes->getValues()[0]);
    }
}
