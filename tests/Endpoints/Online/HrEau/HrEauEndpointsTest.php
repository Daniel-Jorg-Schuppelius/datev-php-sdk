<?php
/*
 * Created on   : Fri Jul 03 2026
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : HrEauEndpointsTest.php
 * License      : MIT License
 * License Uri  : https://opensource.org/license/mit
 */

declare(strict_types=1);

namespace Tests\Endpoints\Online\HrEau;

use Datev\API\Online\Endpoints\HrEau\{ClientsEndpoint, EauRequestsEndpoint};
use Datev\API\Online\OnlineService;
use Datev\Entities\Online\Common\ConsultantClientNumber;
use Datev\Entities\Online\HrEau\Clients\ClientId;
use Datev\Entities\Online\HrEau\EauRequests\{EauRequest, Feedbacks};
use Tests\Contracts\OnlineEndpointTest;

class HrEauEndpointsTest extends OnlineEndpointTest {
    private const CLIENT_ID = '1234567-12345';

    private const PERSONNEL_NUMBER = '77';

    private const EAU_REQUEST_ID = 'c0ffee00-1111-2222-3333-444455556666';

    protected function getService(): OnlineService {
        return OnlineService::HrEau;
    }

    private function base(): string {
        return 'clients/' . self::CLIENT_ID . '/employees/' . self::PERSONNEL_NUMBER . '/eau-requests';
    }

    private function createEndpoint(): EauRequestsEndpoint {
        return new EauRequestsEndpoint($this->client, new ConsultantClientNumber(1234567, 12345), self::PERSONNEL_NUMBER);
    }

    public function test_get_client(): void {
        $this->registerMockResponse('GET', 'clients/' . self::CLIENT_ID, 200, ['clientID' => self::CLIENT_ID]);

        $endpoint = new ClientsEndpoint($this->client);
        $client = $endpoint->get(self::CLIENT_ID);

        $this->assertInstanceOf(ClientId::class, $client);

        if ($this->isUsingMock()) {
            $this->assertSame(self::CLIENT_ID, $client->getClientID());
        }
    }

    public function test_create_eau_request(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('POST', $this->base(), 201, null, [
            'location' => $this->base() . '/' . self::EAU_REQUEST_ID,
        ]);

        $request = new EauRequest([
            'source' => 'systemName v1.0',
            'start_work_incapacity' => '2026-07-01',
            'notification' => ['email' => 'lohn@kanzlei.example'],
            'follow_up_certification' => false,
        ]);

        $jobLocation = $this->createEndpoint()->create($request);

        $this->assertNotNull($jobLocation);
        $this->assertSame(self::EAU_REQUEST_ID, $jobLocation->getJobId());

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertSame('2026-07-01', $lastRequest['options']['json']['start_work_incapacity'] ?? null);
    }

    public function test_get_feedbacks(): void {
        $this->registerMockResponse('GET', $this->base() . '/' . self::EAU_REQUEST_ID . '/feedbacks', 200, [
            [
                'source' => 'systemName v1.0',
                'start_work_incapacity' => '2026-07-01',
                'feedbacks_from_health_insurance' => [
                    [
                        'guid' => 'fb-1',
                        'incapacity_for_work' => ['start_work_incapacity_au' => '2026-07-01', 'accident_at_work' => false, 'initial_certificate' => true],
                        'error_block_list' => [],
                    ],
                ],
            ],
        ]);

        $feedbacks = $this->createEndpoint()->getFeedbacks(self::EAU_REQUEST_ID);

        $this->assertInstanceOf(Feedbacks::class, $feedbacks);

        if ($this->isUsingMock()) {
            $feedback = $feedbacks->getFirstValue();
            $insuranceFeedback = $feedback?->getFeedbacksFromHealthInsurance()?->getFirstValue();
            $this->assertSame('fb-1', $insuranceFeedback?->getGuid());
            $this->assertTrue($insuranceFeedback->getIncapacityForWork()?->isInitialCertificate());
        }
    }

    public function test_cancel_eau_request(): void {
        if (!$this->isUsingMock()) {
            $this->markTestSkipped('Mock-only test');
        }

        $this->registerMockResponse('DELETE', $this->base() . '/' . self::EAU_REQUEST_ID, 204);

        $this->createEndpoint()->cancel(self::EAU_REQUEST_ID);

        $mockClient = $this->mockClient;
        $this->assertNotNull($mockClient);
        $requests = $mockClient->getRecordedRequests();
        $lastRequest = end($requests);
        $this->assertNotFalse($lastRequest);
        $this->assertSame('DELETE', $lastRequest['method']);
    }
}
