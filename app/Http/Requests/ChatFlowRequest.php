<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChatFlowRequest extends FormRequest
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
            'id' => ['required', 'uuid'],
            'name' => ['required', 'string'],
            'flowData' => ['nullable', 'array'],
            'deployed' => ['boolean'],
            'isPublic' => ['boolean'],
            'apikeyid' => ['nullable', 'string'],
            'chatbotConfig' => ['nullable', 'array'],
            'apiConfig' => ['nullable', 'array'],
            'analytic' => ['nullable', 'array'],
            'speechToText' => ['nullable', 'array'],
            'category' => ['nullable', 'string'],
            'type' => ['required', 'in:CHATFLOW,CHATFLOWMULTIAGENT'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'ChatFlow ID is required.',
            'id.uuid' => 'ChatFlow ID must be a valid UUID.',
            'name.required' => 'ChatFlow name is required.',
            'name.string' => 'ChatFlow name must be a string.',
            'flowData.array' => 'ChatFlow data must be an array.',
            'deployed.boolean' => 'Deployed data must be a boolean.',
            'isPublic.boolean' => 'Deployed data must be a boolean.',
            'apikeyid.string' => 'API keyid must be a string.',
            'chatbotConfig.array' => 'ChatBot config must be an array.',
            'apiConfig.array' => 'API config must be an array.',
            'analytic.array' => 'Analytic must be an array.',
            'speechToText.array' => 'SpeechToText must be an array.',
            'category.string' => 'Category must be a string.',
            'type.in' => 'Invalid ChatFlow type.',
        ];
    }
}
