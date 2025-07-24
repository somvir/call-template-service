<?php

namespace App\Repositories\Interfaces;

use App\DTOs\CreateCallTemplateDTO;
use App\DTOs\UpdateCallTemplateDTO;
use App\Models\CallTemplate;
use Illuminate\Support\Collection;

interface CallTemplateRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?CallTemplate;
    public function create(CreateCallTemplateDTO $dto): CallTemplate;
    public function update(CallTemplate $template, UpdateCallTemplateDTO $dto): CallTemplate;
    public function delete(CallTemplate $template): bool;
}