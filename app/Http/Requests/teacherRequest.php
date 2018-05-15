<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class teacherRequest extends FormRequest
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
   'name'=>'required|string|max:50',
             'email' => 'required|string|email|max:255|unique:teachers',
             'password' => 'required|string|min:6',
             'inputPhone' => 'required|regex:/[0-9]/|max:11|min:8',
             'inputAddress' => 'required|string|min:3',        ];
    }
}
