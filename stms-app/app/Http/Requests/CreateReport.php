<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReport extends FormRequest
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
            'report_title' => 'required',
            'attachment'=> 'required'
        ];
    }
    public function message(){
        return[
            'report_title.required'=> 'The name of tittle is required',
            'attachment.required'=> 'The attachment is required',
        ];
    }
}
