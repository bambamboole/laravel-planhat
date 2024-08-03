<?php declare(strict_types=1);

namespace Bambamboole\LaravelPlanhat\Tests\Unit;

use Bambamboole\LaravelPlanhat\PlanhatApiClient;
use Bambamboole\LaravelPlanhat\Tests\Traits\ProvideResponsePayloads;
use Illuminate\Http\Client\Factory;
use PHPUnit\Framework\TestCase;

class PlanhatApiClientTest extends TestCase
{
    use ProvideResponsePayloads;

    private Factory $http;

    protected function setUp(): void
    {
        $this->http = new Factory;
    }

    public function testItCanFetchLeanCompaniesByExternalId()
    {
        $this->http->fake(['https://api.planhat.com/leancompanies?externalId=test' => $this->leanCompaniesResponse()]);

        $result = $this->createSubject()->getLeanCompanies('test');

        $this->assertCount(4, $result);
    }

    public function testItCanFetchCompaniesById()
    {
        $this->http->fake(['https://api.planhat.com/companies/extid-test' => $this->companyResponse()]);

        $result = $this->createSubject()->getCompanyById('test');

        self::assertSame('Tenet', $result->name);
    }

    private function createSubject(): PlanhatApiClient
    {
        return new PlanhatApiClient($this->http, 'test');
    }
}
