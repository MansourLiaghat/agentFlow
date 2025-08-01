<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NodeRequest extends FormRequest
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
            'chat_flow_id' => ['required', 'uuid', 'exists:chat_flows,id'],
            'type' => ['required', 'string'],
            'data' => ['required', 'array'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'Node ID is required.',
            'id.uuid' => 'Node ID must be a valid UUID.',
            'chat_flow_id.required' => 'ChatFlowID is required.',
            'chat_flow_id.uuid' => 'ChatFlowID must be a valid UUID.',
            'chat_flow_id.exists' => 'ChatFlowID does not exist.',
            'type.required' => 'Type is required.',
            'type.string' => 'Type must be a string.',
            'data.required' => 'Data is required.',
            'data.array' => 'Data must be an array.',
        ];
    }
}
