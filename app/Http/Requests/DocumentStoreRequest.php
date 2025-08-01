<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'id' => ['nullable', 'uuid'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'loaders' => ['nullable', 'array'],
            'whereUsed' => ['nullable', 'array'],
            'status' => ['required', Rule::in(['EMPTY', 'SYNC', 'SYNCING', 'STALE', 'NEW', 'UPSERTING', 'UPSERTED'])],
            'vectorStoreConfig' => ['nullable', 'array'],
            'embeddingConfig' => ['nullable', 'array'],
            'recordManagerConfig' => ['nullable', 'array'],
            'createdDate' => ['nullable', 'date'],
            'updatedDate' => ['nullable', 'date'],
        ];
    }

}
