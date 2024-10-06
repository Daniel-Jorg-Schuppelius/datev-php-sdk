<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DocumentTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Logger\ConsoleLoggerFactory;
use Datev\Entities\DocumentManagement\Documents\Document;
use PHPUnit\Framework\TestCase;

class DocumentTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateDocument() {
        $data = [
            "acknowledge_by" => [
                [
                    "name" => "Mustermann, Bob, BobM13",
                    "removed_acknowledgement" => "2021-03-04T14:03:58.310",
                    "acknowledged" => "2021-03-04T14:03:58.310",
                    "is_deleted" => "false",
                    "id" => "35e98168-01dd-4104-a273-79e38b3c3b22"
                ]
            ],
            "amount" => "150,95",
            "application" => "KARE",
            "case_number" => 0,
            "change_date_time" => "2021-04-28T14:03:58.310",
            "checked_out" => "true",
            "class" => [
                "name" => "Dokument",
                "id" => 1
            ],
            "correspondence_partner_guid" => "e602ddcb-e479-4cee-b268-e53bbecf6dc9",
            "correspondence_partner_firm_number" => 0,
            "cost_quantity" => 1.25,
            "cost_date" => "2020-12-10T00:00:00",
            "cost_number1" => 1000,
            "cost_number2" => 2000,
            "create_date_time" => "2021-04-28T14:03:58.310",
            "creation_user" => "unknown",
            "deletion_date" => "2020-12-10T00:00:00",
            "description" => "Eingangsrechnung 19.01.2021",
            "domain" => [
                "name" => "Mandanten",
                "id" => "1"
            ],
            "employee" => [
                "name" => "Mustermann, Max",
                "is_active" => "true",
                "id" => 11
            ],
            "export_date_time" => "2020-01-14T00:00:00",
            "extension" => "docx",
            "folder" => [
                "name" => "Stammakte",
                "id" => 3
            ],
            "is_binder" => "false",
            "is_shared" => "false",
            "import_date_time" => "2020-01-14T00:00:00",
            "inbox" => "false",
            "inbox_date" => "2021-04-28T00:00:00.000",
            "individual_property1" => "N BG 1423",
            "individual_property2" => "Audi A4",
            "individual_property3" => "123 PS",
            "individual_property4" => "4 Sitzer",
            "individual_property5" => "3.0",
            "individual_property6" => "5.0",
            "individual_property7" => "true",
            "individual_property8" => "true",
            "individual_property9" => "2020-01-14T00:00:00",
            "individual_property10" => "2020-01-14T00:00:00",
            "individual_reference1" => [
                "name" => "Bob",
                "id" => "1"
            ],
            "individual_reference2" => [
                "name" => "Bob",
                "id" => "1"
            ],
            "keywords" => "These, are, keywords",
            "month" => 11,
            "more_years" => "2015,2016,2017",
            "note" => [
                "text" => "This is an example of a note",
                "popup" => "true"
            ],
            "number" => 3001,
            "order" => [
                "assessment_year" => "2021",
                "creation_year" => "2021",
                "name" => "Jahresurlaub",
                "number" => 92,
                "id" => 1056
            ],
            "outbox" => "true",
            "outbox_date" => "2021-03-31",
            "outbox_parked" => "true",
            "priority" => 1,
            "property_template" => [
                "name" => "BaM ESt-Bescheid",
                "supplement" => "Eine Ergänzung",
                "id" => 1056
            ],
            "read_only" => "true",
            "receipt_date" => "2020-12-14T00:00:00",
            "receipt_number" => 123456,
            "reference_file" => "true",
            "register" => [
                "name" => "Korrespondenz",
                "id" => 2
            ],
            "revision_user" => "unknown",
            "secure_area" => [
                "name" => "Kanzleileitung",
                "id" => "1"
            ],
            "state" => [
                "name" => "offen",
                "id" => 5
            ],
            "structure_items" => [
                [
                    "name" => "EST.pdf",
                    "counter" => "1",
                    "creation_date" => "2012-11-07T15:26:40+01:00",
                    "last_modification_date" => "2021-01-04T11:37:40.7188738+01:00",
                    "type" => 1,
                    "parent_counter" => 0,
                    "document_link" => "96e01d5b-952d-4c1f-a634-76bebcc7ee99",
                    "document_file_id" => 1489,
                    "revision_comment" => "Datei XY zu der Struktur unter den Ordner 4. Quartal hinzugefügt",
                    "id" => 976058
                ]
            ],
            "user" => [
                "name" => "Mustermann, Bob, BobM13",
                "is_deleted" => "false",
                "is_user_group" => "false",
                "id" => "35e98168-01dd-4104-a273-79e38b3c3b22"
            ],
            "year" => 2021,
            "id" => "e602ddcb-e479-4cee-b268-e53bbecf6dc9"
        ];

        $document = new Document($data, $this->logger);
        $this->assertTrue($document->isValid());
        $this->assertInstanceOf(Document::class, new Document());
        $this->assertTrue((new Document())->isValid());
        $this->assertInstanceOf(Document::class, $document);
        $this->assertEquals('e602ddcb-e479-4cee-b268-e53bbecf6dc9', $document->getID()->getValue());
        $this->assertTrue($document->getID()->isValid());
        $this->assertEquals(150.95, $document->getAmount());
    }
}
