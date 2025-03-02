<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|string|max:255',
            'type' => 'bail|required|string',
            'description' => 'bail|required|string',
            'location' => 'bail|required|string',
            'salary' => 'bail|nullable|string',
            'company.name' => 'bail|required|string|max:255',
            'company.description' => 'bail|required|string',
            'company.contactEmail' => 'bail|required|string',
            'company.contactPhone' => 'bail|nullable|string',
        ];
    }
}
