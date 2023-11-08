<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewRegi extends FormRequest
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
            'name' => 'required|max:20',
            'kana' => 'required|max:30',
            'email' => 'required|unique:users|email:dns',
            'phone' => 'nullable|regex:/^[0-9]+$/i|max:11',
            'password' => 'required|confirmed'
        ];
    }
}
