<?php
namespace App\DTOs;

readonly class UpdateCallTemplateDTO
{
    public function __construct(
        public string $name,
        public string $prompt,
        public bool $is_active,
    ) {}
}