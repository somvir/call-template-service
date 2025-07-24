<?php

namespace App\Services;

use App\Repositories\Interfaces\CallTemplateRepositoryInterface;
use App\DTOs\CreateCallTemplateDTO;
use App\DTOs\UpdateCallTemplateDTO;
use App\Models\CallTemplate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class CallTemplateService
{
    public function __construct(
        private CallTemplateRepositoryInterface $repository
    ) {}

    public function getAllTemplates(): Collection
    {
        $cacheKey = "tenant:{$this->getTenantId()}:templates";
    
        return Cache::remember($cacheKey, now()->addMinutes(10), function () {
            return $this->repository->all();
        });
      
    
    }

    public function getTemplateById(int $id): ?CallTemplate
    {
        return $this->repository->find($id);
    }

    public function createTemplate(CreateCallTemplateDTO $dto): CallTemplate
    {
        return $this->repository->create($dto);
    }

    public function updateTemplate(CallTemplate $template, UpdateCallTemplateDTO $dto): CallTemplate
    {
        return $this->repository->update($template, $dto);
    }

    public function deleteTemplate(CallTemplate $template): bool
    {
        return $this->repository->delete($template);
    }

    private function getTenantId(): int
    {
        return Auth::user()->company_id ?? 0; // Default to 0 if not authenticated

    }
    

}