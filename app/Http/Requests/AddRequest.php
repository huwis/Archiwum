<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
        $year=date('Y');
        return [
            'name' =>'required|max:191',
            'description' =>'required',
            'year_of_creation' =>'required|digits:4|integer|min:1|max:'.$year,
            'place' =>'required|unique:documents|max:191',
            
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Nazwa jest obowiązkowa.',
            'name.max' => 'Nazwa może mieć maksymalnie 191 znaków.',
            'description.required'  => 'Opis jest obowiązkowy.',
            'year_of_creation.required' => 'Rok powstania jest obowiązkowa.',
            'year_of_creation.digits' => 'Rok powstania musi mieć maksymalnie 4 cyfry.',
            'year_of_creation.min' => 'Zły rok powstania.',
            'year_of_creation.max' => 'Zły rok powstania.',
            'place.required' =>'Miejsce jest obowiązkowe',
            'place.unique' =>'Miejsce musi być unikalne',
            'place.max' => 'Miejsce może mieć maksymalnie 191 znaków.',
        ];
    }
}
