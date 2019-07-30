<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
            'first_name' =>'required|max:30',
            'surname' =>'required|max:50',
            'pesel' =>'required|unique:users|size:11',
            'name' =>'required|unique:users|max:30',
            'password' =>'required|min:6',
        ];
    }
    
     public function messages()
    {
        return [
            'first_name.required' => 'Imię jest obowiązkowe',
            'first_name.max' => 'Imię może mieć maksymalnie 20 znaków',
            'surname.required'  => 'Nazwisko jest obowiązkowe',
            'surname.max' => 'Nazwisko może mieć maksymalnie 30 znaków',
            'pesel.required' => 'Pesel jest obowiązkowy',
            'pesel.unique' => 'Pesel musi być unikalny',
            'pesel.size' => 'Pesel musi mieć 11 cyfr',
            'name.required' => 'Nazwa jest obowiązkowa',
            'name.unique' => 'Nazwa musi być unikalna',
            'name.max' => 'Imię musi mieć maksymalnie 20 znaków',
            'password.required' => 'Hasło jest obowiązkowe',
            'password.min' => 'Hasło musi mieć minimalnie 6 znaków',
            
        ];
    }
}
