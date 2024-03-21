<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'userTo' => 'required',
            'request_title' => 'required',
            'content'=> 'required'
        ];
    }
    public function message(){
        return[
            // 'email.required'=> 'The email is required',
            'request_title.required'=> 'The name of tittle is required',
            'content.required'=> 'The content is required',

        ];
    }
}
