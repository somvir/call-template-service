<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\DTOs\CreateCallTemplateDTO;
use App\DTOs\UpdateCallTemplateDTO;
use App\Http\Requests\Api\V1\StoreCallTemplateRequest;
use App\Http\Requests\Api\V1\UpdateCallTemplateRequest;
use App\Http\Resources\CallTemplateResource;
use App\Models\CallTemplate;
use App\Services\CallTemplateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CallTemplateController extends Controller
{
    use AuthorizesRequests;

    public function __construct(private CallTemplateService $service)
    {
      $this->authorizeResource(CallTemplate::class, 'template'); 

    }

    public function index(): AnonymousResourceCollection
    {
        return CallTemplateResource::collection($this->service->getAllTemplates());
    }

    public function store(StoreCallTemplateRequest $request): CallTemplateResource
    {
        $dto = new CreateCallTemplateDTO(
            company_id: $request->user()->company_id,
            name: $request->name,
            prompt: $request->prompt,
            is_active: $request->boolean('is_active', true)
        );

        return new CallTemplateResource($this->service->createTemplate($dto));
    }

    public function show(CallTemplate $template): CallTemplateResource
    {
        return new CallTemplateResource($template);
    }

    public function update(UpdateCallTemplateRequest $request, CallTemplate $template): CallTemplateResource
    {
        $dto = new UpdateCallTemplateDTO(
            name: $request->name,
            prompt: $request->prompt,
            is_active: $request->boolean('is_active')
        );

        return new CallTemplateResource($this->service->updateTemplate($template, $dto));
    }

    public function destroy(CallTemplate $template): JsonResponse
    {
        $this->service->deleteTemplate($template);
        return response()->json(['message' => 'Template deleted successfully'], 204);
    }
}
