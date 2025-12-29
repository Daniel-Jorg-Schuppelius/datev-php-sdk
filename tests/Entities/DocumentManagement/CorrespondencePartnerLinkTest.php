<?php
/*
 * Created on   : Sat Dec 28 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : CorrespondencePartnerLinkTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\DocumentManagement;

use Datev\Entities\DocumentManagement\CorrespondencePartners\CorrespondencePartnerLink;
use ERRORToolkit\Factories\ConsoleLoggerFactory;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CorrespondencePartnerLinkTest extends TestCase {
    private LoggerInterface $logger;

    public function setUp(): void {
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateFromString(): void {
        $url = "https://example.com/partner/12345";
        $link = new CorrespondencePartnerLink($url, $this->logger);

        $this->assertEquals($url, $link->getValue());
        $this->assertEquals('correspondence_partner_link', $link->getEntityName());
    }

    public function testIsValid(): void {
        $link = new CorrespondencePartnerLink("https://example.com/partner", $this->logger);
        $this->assertTrue($link->isValid());
    }
}
