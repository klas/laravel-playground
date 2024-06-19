<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
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
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'activity_type_id' => 'nullable|integer',
            'distance' => 'nullable|numeric',
            'distance_unit_id' => 'nullable|integer',
            'start' => 'nullable|date',
            'finish' => 'nullable|date',
            'status' => 'nullable|integer',
            'user_id' => 'nullable|integer'
        ];
    }
}
