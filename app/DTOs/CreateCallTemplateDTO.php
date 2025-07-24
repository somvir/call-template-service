<?php

namespace App\DTOs;

readonly class CreateCallTemplateDTO
{
    public function __construct(
        public int $company_id,
        public string $name,
        public string $prompt,
        public bool $is_active = true,
    ) {}
}