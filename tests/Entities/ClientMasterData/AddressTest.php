<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddressTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use APIToolkit\Logger\ConsoleLogger;
use APIToolkit\Factories\ConsoleLoggerFactory;
use DateTime;
use Datev\Entities\ClientMasterData\Addresses\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateAddress() {
        $data = [
            "id" => "17b9d6d3-117b-4555-b0b0-3659eb0279d7",
            "type" => "street",
            "city" => "München",
            "country_code" => "DE",
            "postal_code" => "80335",
            "post_office_box" => "abc",
            "street" => "Musterstr. 3",
            "additional_correspondence_title" => "Herrn/Frau/Firma",
            "additional_delivery_text1" => "Schreinerei Musterholz",
            "additional_delivery_text2" => "Offene Handelsgesellschaft",
            "additional_shipping_information" => "Wenn unzustellbar, zurück",
            "address_appendix" => "z. H. Herrn Mustermann",
            "address_manually_edited" => "abc",
            "is_address_manually_edited" => false,
            "note" => "Das ist eine Notiz zur Anschrift",
            "valid_from" => "2020-01-02T00:00:00.000+00:00",
            "valid_to" => "2020-02-02T00:00:00.000+00:00",
            "currently_valid" => true,
            "is_correspondence_address" => true,
            "is_debitor_address" => true,
            "is_main_post_office_box_address" => false,
            "is_main_street_address" => true,
            "is_management_address" => true
        ];

        $address = new Address($data, $this->logger);
        $this->assertTrue($address->isValid());
        $this->assertInstanceOf(Address::class, new Address());
        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($data, $address->toArray());
        $this->assertEquals("München", $address->getCity());
        $this->assertEquals(new DateTime("2020-01-02"), $address->getValidFrom());
    }
}
