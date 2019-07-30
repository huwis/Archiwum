<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AddRequest;
use Illuminate\Support\Facades\DB;


class EditController extends Controller
{
        public function show($id){
            $documents= DB::table('documents')->where('id',$id)->first();
            return view('edit',["document"=>$documents]);
        }   
        
        public function edit(Request $request){
            $year=date('Y');    
            $request->validate([
                    'place' =>'required|unique:documents,place,'.$request->input('id'),
                    'name' =>'required',
                    'description' =>'required',
                    'state' =>'required',
                    'year_of_creation' =>'required|digits:4|integer|min:1|max:'.$year,
                    ],
                    [
                    'name.required' => 'Nazwa jest obowiązkowa.',
                    'description.required'  => 'Opis jest obowiązkowy.',
                    'state.required' => 'Status jest obowiązkowy.',
                    'year_of_creation.required' => 'Rok powstania jest obowiązkowy.',
                    'year_of_creation.digits' => 'Rok powstania musi mieć maksymalnie 4 cyfry.',
                    'year_of_creation.min' => 'Zły rok powstania.',
                    'year_of_creation.max' => 'Zły rok powstania.',
                    'place.required' =>'Miejsce jest obowiązkowe',
                    'place.unique' =>'Miejsce musi być unikalne',          
                    ]   
            );
        
            DB::table('documents')->where('id',$request->input('id'))
                    ->update([
                        'name'=>$request->input('name'),
                        'place'=>$request->input('place'),
                        'description'=>$request->input('description'),
                        'year_of_creation'=>$request->input('year_of_creation'),
                        'state'=>$request->input('state')
                    ]); 
            return redirect()->route('main')->with('message', 'Udało się pomyślnie edytować dokument.');
        }
}
