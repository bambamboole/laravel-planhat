<?php declare(strict_types=1);

namespace Bambamboole\LaravelPlanhat\DTO;

class DTOFactory
{
    public function createLeanCompanyFromApiResponse(array $data): LeanCompany
    {
        return new LeanCompany(
            id: $data['_id'],
            name: $data['name'],
            externalId: $data['externalId'],
            sourceId: $data['sourceId'],
        );
    }

    public function createCompanyFromApiResponse(array $data): Company
    {
        return new Company(
            $data['name'],
            $data,
        );
    }
}
