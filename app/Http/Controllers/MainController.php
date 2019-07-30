<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function show(){ 
        return view('main');
    }
    
    public function store(Request $request){
        $doc = new Document;
        $doc->name = $request->input('name');
        $doc->description = $request->input('description');
        $doc->place = $request->input('place');
        $doc->year_of_creation = $request->input('year_of_creation');
        $doc->state = $request->input('state');
                
        return view('show',["documentsList"=>document::query()->where('name','LIKE',"%{$doc->name}%")
                                                              ->Where('description','LIKE',"%{$doc->description}%")
                                                              ->Where('place','LIKE',"%{$doc->place}%")
                                                              ->Where('year_of_creation','LIKE',"%{$doc->year_of_creation}%")
                                                              ->Where('state','LIKE',"%{$doc->state}%")
                                                              ->get()]);
    }
}

   