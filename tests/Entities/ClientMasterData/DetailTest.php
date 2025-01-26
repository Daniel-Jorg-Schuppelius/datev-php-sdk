<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : DetailTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use ERRORToolkit\Logger\ConsoleLogger;;

use ERRORToolkit\Factories\ConsoleLoggerFactory;
use Datev\Entities\ClientMasterData\Details\Detail;
use PHPUnit\Framework\TestCase;

class DetailTest extends TestCase {
    private ?ConsoleLogger $logger = null;

    public function __construct($name) {
        parent::__construct($name);
        $this->logger = ConsoleLoggerFactory::getLogger();
    }

    public function testCreateDetail() {
        $data = [
            "complimentary_close" => "Mit freundlichen Grüßen",
            "correspondence_title" => "Herrn",
            "national_right" => "DE",
            "note" => "Notiz zu Adressat Erwin Mustermeier",
            "salutation" => "Sehr geehrte Damen und Herren,",
            "all_first_names" => "Albrecht Wenzel Eusebius",
            "birth_name" => "Schmidtmuster",
            "considerations" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "AUSBILDG"
                ]
            ],
            "current_consideration" => "AUSBILDG",
            "country_of_birth" => "DE",
            "date_of_death" => "2010-01-15T00:00:00.000+00:00",
            "date_of_expiry" => "2020-04-30T00:00:00.000+00:00",
            "date_of_issue" => "2012-03-18T00:00:00.000+00:00",
            "degree" => "Dr.",
            "denominations" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "RK"
                ]
            ],
            "current_denomination" => "RK",
            "federal_states_of_natural_person" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "BAY"
                ]
            ],
            "current_federal_state_of_natural_person" => "BAY",
            "identification_number" => "T220001293",
            "issuing_authority" => "VGM Musterhausen",
            "job_titles" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Bäcker"
                ]
            ],
            "current_job_title" => "Bäcker",
            "marital_statuses" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "VH"
                ]
            ],
            "current_marital_status" => "VH",
            "name_prefix" => "von",
            "nationality" => "Deutsch",
            "paper_of_identity" => "PA",
            "pension_insurance_institute" => "Rentenversicherung",
            "place_of_birth" => "München",
            "register_of_births_number" => "1980/123",
            "register_office_of_birth" => "München",
            "social_security_number" => "66150872P080",
            "title_of_nobility" => "Graf",
            "codes_of_classification_of_economic_activities_2008" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "43.32.0"
                ]
            ],
            "current_code_of_classification_of_economic_activities_2008" => "43.32.0",
            "descriptions_of_classification_of_economic_activities_2008" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Bautischlerei und -schlosserei"
                ]
            ],
            "current_description_of_classification_of_economic_activities_2008" => "Bautischlerei und -schlosserei",
            "mad_codes_of_classification_of_economic_activities_2008" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "D01.00FF43.32.0000000000000000"
                ]
            ],
            "current_mad_code_of_classification_of_economic_activities_2008" => "D01.00FF43.32.0000000000000000",
            "codes_of_classification_of_economic_activities_2003" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "45.42.0"
                ]
            ],
            "current_code_of_classification_of_economic_activities_2003" => "45.42.0",
            "descriptions_of_classification_of_economic_activities_2003" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Bautischlerei und -schlosserei"
                ]
            ],
            "current_description_of_classification_of_economic_activities_2003" => "Bautischlerei und -schlosserei",
            "mad_codes_of_classification_of_economic_activities_2003" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "01.00AFA45.42.0000000000000000"
                ]
            ],
            "current_mad_code_of_classification_of_economic_activities_2003" => "01.00AFA45.42.0000000000000000",
            "countries_of_head_office" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "DE"
                ]
            ],
            "current_country_of_head_office" => "DE",
            "date_of_memorandum_of_association" => "1970-04-10T00:00:00.000+00:00",
            "distributions_of_profit" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "BRUCH"
                ]
            ],
            "current_distribution_of_profit" => "BRUCH",
            "enterprise_purposes" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Schreinerei"
                ]
            ],
            "current_enterprise_purpose" => "Schreinerei",
            "federal_states_mad_of_legal_person" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => 2
                ]
            ],
            "current_federal_state_mad_of_legal_person" => 2,
            "federal_states_of_legal_person" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "BAY"
                ]
            ],
            "current_federal_state_of_legal_person" => "BAY",
            "fiscal_years" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "01013112"
                ]
            ],
            "current_fiscal_year" => "01013112",
            "kind_of_register_courts" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "HAN"
                ]
            ],
            "current_kind_of_register_court" => "HAN",
            "locations_of_head_office" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "München"
                ]
            ],
            "current_location_of_head_office" => "München",
            "names_of_register_court" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "München"
                ]
            ],
            "current_name_of_register_court" => "München",
            "registered_company_names" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Schreinerei Mustermeier GmbH"
                ]
            ],
            "current_registered_company_name" => "Schreinerei Mustermeier GmbH",
            "registration_date" => "2020-01-02T00:00:00.000+00:00",
            "registration_numbers" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "HRB 123"
                ]
            ],
            "current_registration_number" => "HRB 123",
            "three_lined_company_names_first_line" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Mustermeier GmbH"
                ]
            ],
            "current_three_lined_company_name_first_line" => "Mustermeier",
            "three_lined_company_names_second_line" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Mustermeier GmbH"
                ]
            ],
            "current_three_lined_company_name_second_line" => "Gesellschaft mit beschränkter Haftung",
            "three_lined_company_names_third_line" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Mustermeier GmbH"
                ]
            ],
            "current_three_lined_company_name_third_line" => "Schreinerei",
            "two_lined_company_names_first_line" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Mustermeier GmbH"
                ]
            ],
            "current_two_lined_company_name_first_line" => "Schreinerei Mustermeier",
            "two_lined_company_names_second_line" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Mustermeier GmbH"
                ]
            ],
            "current_two_lined_company_name_second_line" => "Gesellschaft mit beschränkter Haftung",
            "winding_up_date" => "2017-08-12T00:00:00.000+00:00",
            "winding_up_proceedings" => "IA"
        ];

        $detail = new Detail($data, $this->logger);
        $this->assertTrue($detail->isValid());
        $this->assertInstanceOf(Detail::class, new Detail());
        $this->assertInstanceOf(Detail::class, $detail);
        $this->assertEquals($data, $detail->toArray());
    }
}
