<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ];
    }

    /**
     * It will customize the error messages
     */
    public function messages() 
    {
        return [
            'name.required' => 'Please enter your name'
        ];
    }

    /**
     * It will customize our attribute names in the errors
     */
    public function attributes()
    {
        return [
            'email' => 'email address'
        ];
    }
}
