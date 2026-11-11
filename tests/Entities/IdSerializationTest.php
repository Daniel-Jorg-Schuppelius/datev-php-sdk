<?php
/*
 * Created on   : Wed Nov 11 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : IdSerializationTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Entities;

use Datev\Entities\OrderManagement\ExpensePostings\ExpensePosting;
use Datev\Entities\Payroll\BatchResponse\Succeeded\SucceededResponse;
use PHPUnit\Framework\TestCase;

/**
 * Fremdschlüssel gehen als Wert in Payloads (api-toolkit ≥ 2.12); created_id ist laut
 * Spec ein Objekt {"id": …} und bleibt verpackt.
 */
final class IdSerializationTest extends TestCase {
    public function test_guid_foreign_key_is_sent_as_value(): void {
        $posting = ExpensePosting::fromJson('{"employee_id":"11111111-2222-4333-8444-555555555555"}');

        $this->assertSame('11111111-2222-4333-8444-555555555555', $posting->toArray()['employee_id']);
    }

    public function test_created_id_keeps_its_object(): void {
        $response = SucceededResponse::fromJson('{"index":0,"created_id":{"id":4711}}');

        $this->assertSame(['id' => 4711], $response->toArray()['created_id']);
    }
}
