<?php declare(strict_types=1);

namespace Bambamboole\LaravelPlanhat\DTO;

class LeanCompany
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $externalId,
        public readonly string $sourceId,
    ) {}
}
