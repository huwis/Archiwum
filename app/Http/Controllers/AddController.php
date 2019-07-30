<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AddRequest;
use App\Models\Document;
use Illuminate\Support\Facades\DB;


class AddController extends Controller
{
    
    public function show(){
        return view('add');
    }
      
    public function store(AddRequest $request){          
        $doc = new Document;
        $doc->name = $request->input('name');
        $doc->description = $request->input('description');
        $doc->place = $request->input('place');
        $doc->year_of_creation = $request->input('year_of_creation');
        $doc->state = "Dostępny";
        $doc->save();
        return back()->with('message', 'Udało się pomyślnie dodać dokument.');
    }
    
    public function delete(){        
        if( isset($_POST['deletes'])){
            $delets=$_POST['deletes'];
            foreach($delets as $delet){
                DB::table('documents')->where('id',$delet)->delete();
            }
            return back()->with('message','Udało się pomyślnie usunąć dokumenty.'); 
        }
        else{
                return back()->withErrors(['Nie zaznaczono żadnego dokumentu']);
        }
    }
        
}
