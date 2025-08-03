<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreFileRequest extends FormRequest
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
            'id' => 'uuid',
            'document_store_id' => ['required', 'uuid', 'exists:document_stores,id'],
            'doc_id' => ['uuid'],
            'original_name' => ['required', 'string'],
            'file_path' => ['required', 'file', 'max:10240'],
            'metadata' => ['nullable', 'array'],
            'replace_existing' => ['nullable', 'boolean'],
            'create_new_doc_store' => ['nullable', 'boolean'],
            'doc_store' => ['nullable', 'array'],
            'loader' => ['nullable', 'array'],
            'splitter' => ['nullable', 'array'],
            'embedding' => ['nullable', 'array'],
            'vector_store' => ['nullable', 'array'],
            'record_manager' => ['nullable', 'array'],
            'upload' => ['nullable', 'array'],
        ];
    }
    public function messages(): array
    {
        return [
            'id.uuid' => 'The document store id field is an invalid UUID.',
            'document_store_id.required' => 'The document store id field is required.',
            'document_store_id.uuid' => 'The document store id must be a valid UUID.',
            'document_store_id.exists' => 'The document store id must be a valid UUID.',
            'doc_id.uuid' => 'The document id must be a valid UUID.',
            'original_name.required' => 'The original file name field is required.',
            'original_name.string' => 'The original file name must be a string.',
            'file_path.required' => 'The file path field is required.',
            'file_path.file' => 'The file path must be a file.',
            'file_path.max' => 'The file path may not be greater than 1MB.',
            'metadata.array' => 'The metadata field must be an array.',
            'replace_existing.boolean' => 'The metadata field must be a boolean.',
            'create_new_doc_store.boolean' => 'The metadata field must be a boolean.',
            'doc_store.boolean' => 'The doc store field must be a boolean.',
            'loader.boolean' => 'The loader field must be a boolean.',
            'splitter.boolean' => 'The splitter field must be a boolean.',
            'vector_store.boolean' => 'The vector store field must be a boolean.',
            'record_manager.boolean' => 'The record manager field must be a boolean.',
            'upload.boolean' => 'The upload field must be a boolean.',
        ];
    }
}

