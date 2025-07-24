<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCallTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('call_templates')->where(function ($query) {
                    return $query->where('company_id', $this->user()->company_id);
                }),
            ],
            'prompt' => 'required|string',
            'is_active' => 'sometimes|boolean',
        ];
    }
}
