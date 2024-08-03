<?php declare(strict_types=1);

namespace Bambamboole\LaravelPlanhat;

use Bambamboole\LaravelPlanhat\DTO\Company;
use Bambamboole\LaravelPlanhat\DTO\DTOFactory;
use Bambamboole\LaravelPlanhat\DTO\LeanCompany;
use Bambamboole\LaravelPlanhat\Enum\IdType;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;

class PlanhatApiClient
{
    public function __construct(
        private readonly Factory $http,
        private readonly string $token,
        private readonly DTOFactory $dtoFactory = new DTOFactory,
    ) {}

    /** @return LeanCompany[] */
    public function getLeanCompanies(?string $externalId = null, ?string $sourceId = null, ?string $status = null): array
    {
        $companyMap = $this->prepareRequest()
            ->withQueryParameters(array_merge(
                $externalId ? ['externalId' => $externalId] : [],
                $sourceId ? ['sourceId' => $sourceId] : [],
                $status ? ['status' => $status] : [],
            ))
            ->get('leancompanies')
            ->throw();

        return array_map(
            fn (array $company) => $this->dtoFactory->createLeanCompanyFromApiResponse($company),
            $companyMap->json(),
        );
    }

    public function getCompanyById(string $id, IdType $type = IdType::EXTERNAL): Company
    {
        $response = $this->prepareRequest()
            ->get('companies/'.$type->value.$id)
            ->throw();

        return $this->dtoFactory->createCompanyFromApiResponse($response->json());
    }

    protected function prepareRequest(): PendingRequest
    {
        /** @var PendingRequest $request */
        $request = $this->http->withToken($this->token);

        return $request->baseUrl('https://api.planhat.com');
    }
}
