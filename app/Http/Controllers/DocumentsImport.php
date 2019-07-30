<?php

namespace App\Http\Controllers;

use Importer;
use Illuminate\Support\Facades\DB;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentsImport extends Controller
{
    
    public function import(Request $request){
        if($request->hasfile('file')){
            $file= $request->file;
            $excel = Importer::make('Excel');
            $excel->load($file);
            $collection = $excel->getCollection();
            $date= date("Y");
            foreach ($collection as $collect){
                for ($i=1; $i<=5; $i++){
                    if (empty($collect[$i])){
                        return view('main')->withErrors('Plik nie posiada wszystkich danych.');
                    }
                }
            }
            
            foreach ($collection as $collect){
                if ($collect[3]==DB::table('documents')->where('place',$collect[3])->value('place')){
                    return view('main')->withErrors("Plik posiada to samo miejsce co dokument w bazie danych: .$collect[3]");
                }
                if (strlen($collect[3])>191){
                    return view('main')->withErrors('Za długa ilość znaków w polu miejsce dokumentu: '.strlen($collect[3]));
                }  
                if (is_numeric($collect[4]) AND $collect[4]<=$date AND $collect[4]>=1){
                }
                else{
                    return view('main')->withErrors("Zła data powstania dokumentu: $collect[4]");
                }
                if (strlen($collect[1])>191){
                    return view('main')->withErrors("Za długą ilość znaków w polu nazwa dokumentu: ".strlen($collect[1]));
                }
                if($collect[5] != 'Dostępny'){
                    return view('main')->withErrors("Dokument powinien być dostępny");
                }
            }          
           
            foreach ($collection as $collect){  
                DB::table('documents')->Insert([            
                    'name'=>$collect[1],
                    'description'=>$collect[2],
                    'place'=>$collect[3],
                    'year_of_creation'=>$collect[4],
                    'state'=>$collect[5],
                ]);               
            }
            return back()->with('message', 'Udało się pomyślnie zimportować dokumenty.');
        }
        else{
            return view('main')->withErrors('Nie dodano żadnego dokumentu.');
        }         
    }
    
}