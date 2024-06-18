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
            'name' => 'required',
            'description' => 'required',
            'activity_type_id' => 'required',
            'distance' => 'required',
            'distance_unit_id' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'status' => 'required',
            'user_id' => 'required'
        ];
    }
}
