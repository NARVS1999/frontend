<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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
            'email' => 'email|nullable',
            'logo' => 'image|nullable|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'website' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'email.email' => 'The email must be a valid email address.',
            'logo.image' => 'The logo must be an image (jpeg, png, jpg, gif).',
            'logo.mimes' => 'The logo must be in one of the following formats: jpeg, png, jpg, gif.',
            'logo.dimensions' => 'The logo must have a minimum dimension of 100x100 pixels.',
            'website.url' => 'The website must be a valid URL.',
        ];
    }
}
