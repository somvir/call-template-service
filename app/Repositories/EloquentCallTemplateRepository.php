<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CallTemplateRepositoryInterface;
use App\DTOs\CreateCallTemplateDTO;
use App\DTOs\UpdateCallTemplateDTO;
use App\Models\CallTemplate;
use Illuminate\Support\Collection;

class EloquentCallTemplateRepository implements CallTemplateRepositoryInterface
{
    public function all(): Collection
    {
        return CallTemplate::all();
    }

    public function find(int $id): ?CallTemplate
    {
        return CallTemplate::find($id);
    }

    public function create(CreateCallTemplateDTO $dto): CallTemplate
    {
        return CallTemplate::create([
            'company_id' => $dto->company_id,
            'name' => $dto->name,
            'prompt' => $dto->prompt,
            'is_active' => $dto->is_active,
        ]);
    }

    public function update(CallTemplate $template, UpdateCallTemplateDTO $dto): CallTemplate
    {
        $template->update([
            'name' => $dto->name,
            'prompt' => $dto->prompt,
            'is_active' => $dto->is_active,
        ]);
        
        return $template->fresh();
    }

    public function delete(CallTemplate $template): bool
    {
        return $template->delete();
    }
}