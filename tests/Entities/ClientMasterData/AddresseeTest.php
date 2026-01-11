<?php
/*
 * Created on   : Sun Oct 06 2024
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : AddresseeTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities\ClientMasterData;

use Tests\Contracts\EntityTest;

use Datev\Entities\ClientMasterData\Addressees\Addressee;

class AddresseeTest extends EntityTest {
    public function testCreateAddressee() {
        $data = [
            "id" => "16b9d6d3-117b-4553-b0b0-3659eb0279d7",
            "eu_vat_id_country_code" => "DE",
            "eu_vat_id_number" => "812277765",
            "short_names" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Muster"
                ]
            ],
            "current_short_name" => "Muster",
            "status" => "active",
            "surrogate_name" => "Meier",
            "timestamp" => "2017-03-31T00:00:00.000+00:00",
            "type" => "legal_person",
            "date_of_birth" => "1980-03-31T00:00:00.000+00:00",
            "etin" => "abc",
            "firstname" => "Maria",
            "sex" => "male",
            "surnames" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Mustermeier"
                ]
            ],
            "current_surname" => "Mustermeier",
            "tax_identification_number" => "abc",
            "company_names" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "Mustermeier GmbH"
                ]
            ],
            "current_company_name" => "Mustermeier GmbH",
            "date_of_foundation" => "1970-04-01T00:00:00.000+00:00",
            "legal_form_ids" => [
                [
                    "valid_from" => "2020-01-02T00:00:00.000+00:00",
                    "value" => "S00009"
                ]
            ],
            "current_legal_form_id" => "S00009",
            "detail" => [
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
            ],
            "addresses" => [
                [
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
                    "valid_to" => "2021-01-02T00:00:00.000+00:00",
                    "currently_valid" => true,
                    "is_correspondence_address" => true,
                    "is_debitor_address" => true,
                    "is_main_post_office_box_address" => false,
                    "is_main_street_address" => true,
                    "is_management_address" => true
                ]
            ],
            "communications" => [
                [
                    "id" => "20b9d6d9-117b-4555-b0b0-3659eb0279d9",
                    "type" => "phone",
                    "data_content" => "+49 8721 123456",
                    "number_standardized" => "00498721123456",
                    "note" => "ab 9 Uhr",
                    "is_main_communication" => true,
                    "is_management_phone" => true
                ]
            ],
            "bank_accounts" => [
                [
                    "id" => "31b9d6d9-117b-4555-b0b0-3659eb0279d0",
                    "bank_account_number" => "3225553",
                    "bank_code" => "76050101",
                    "bank_name" => "Sparkasse Nürnberg",
                    "bic" => "SSKNDE77XXX",
                    "country_code" => "DE",
                    "differing_account_holder" => "Max Mustermann",
                    "iban" => "DE12760501010003225553",
                    "note" => "Das ist eine Notiz zur Bankverbindung.",
                    "valid_from" => "2015-03-31T00:00:00.000+00:00",
                    "valid_to" => "2018-04-30T00:00:00.000+00:00",
                    "currently_valid" => true,
                    "is_main_bank_account" => true
                ]
            ],
            "tax_offices" => [
                [
                    "id" => "43b9d6d9-117b-4555-b0b0-3659eb0279d4",
                    "country_code" => "DE",
                    "note" => "Das ist eine Notiz zur Finanzamtsverbindung.",
                    "tax_number" => "216/345/98763",
                    "tax_number_certificated" => "9216034598763",
                    "tax_number_standardized" => "21634598763",
                    "tax_office_name" => "Erlangen",
                    "tax_office_number" => 9216,
                    "valid_from" => "2016-01-01T00:00:00.000+00:00",
                    "valid_to" => "2018-12-31T00:00:00.000+00:00",
                    "currently_valid" => true,
                    "is_competent_for_operational_income_tax" => true,
                    "is_competent_for_turnover_tax" => false,
                    "is_competent_for_wage_tax" => false
                ]
            ],
            "contact_persons" => [
                [
                    "id" => "abc",
                    "addressee_id" => "abc",
                    "department" => "abc",
                    "display_name" => "Mustermeier, Sonja",
                    "function" => "abc",
                    "note" => "abc"
                ]
            ]
        ];

        $addressee = new Addressee($data);
        $this->assertTrue($addressee->isValid());
        $this->assertInstanceOf(Addressee::class, new Addressee());
        $this->assertInstanceOf(Addressee::class, $addressee);
        $this->assertEquals($data, $addressee->toArray());
        // $this->assertEquals("München", $addressee->getCity());
        // $this->assertEquals(new DateTime("2020-01-02"), $addressee->getValidFrom());
    }
}
