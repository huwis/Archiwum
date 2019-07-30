<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class ShareRequest extends FormRequest
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
            'first_name' =>'required|max:20',
            'surname' =>'required|max:30',
            'phone' =>'required|size:9',
            'pesel' =>'required|size:11',
            
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
            'pesel.size' => 'Pesel musi mieć 11 cyfr',
            'phone.required' => 'Telefon jest obowiązkowy',
            'phone.size' => 'Telefon musi mieć 11 cyfr',            
        ];
    }
}
