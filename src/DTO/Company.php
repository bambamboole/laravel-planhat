<?php declare(strict_types=1);

namespace Bambamboole\LaravelPlanhat\DTO;

class Company
{
    public function __construct(
        public readonly string $name,
        public readonly array $raw
    ) {}
}
