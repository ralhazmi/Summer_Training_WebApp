<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDegree extends FormRequest
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
    public function rules()
    {
        return [
            'degree' => 'required|integer',
        ];
    }

    /**
     * Get the validation messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'degree.required' => 'The degree of the report is required.',
            'degree.integer' => 'The degree must be a number.',
        ];
    }
}
