<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\share;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ShareRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ShareController extends Controller
{
    public function show()
    {
        if( isset($_GET['deletes'])){
            Cache::put('key', $_GET['deletes'],1);
            $checks=$_GET['deletes'];
            $abc=count($checks);
            foreach ($checks as $check){
                $checking[]=  DB::table('documents')->where('id',$check)->value('state'); 
            }                  
            for($i=0; $i<$abc; $i++){
                if ($checking[$i]=='Udostępniony'){
                    return back()->withErrors(['Dokument jest już udostępniony']);
                }
            }

            return view('share'); 
        }
        else{
            return back()->withErrors(['Nie zaznaczono żadnego dokumentu']);
        }
    }
    
    
    public function share(ShareRequest $request)
    {
        $documents_id= Cache::get('key');
        foreach($documents_id as $document_id){    
            $doc = new share;
            $doc->document_id =$document_id;
            $doc->first_name = $request->input('first_name');
            $doc->surname = $request->input('surname');
            $doc->phone = $request->input('phone');
            $doc->pesel = $request->input('pesel');
            $doc->date_of_share = date('Y-m-d');
            $doc1 = new user;
            $doc1->name = Auth::user()->name;
            $doc->user_id = DB::table('users')->where('name',$doc1->name)->value('id'); 
            DB::table('documents')->where('id',$doc->document_id)->update(['state'=>"Udostępniony"]);
            $doc->save();
        } 

        Cache::forget('key');
        return redirect()->route('main')->with('message', 'Udało się pomyślnie udostępnić dokumenty.'); 
    }
    
    public function ret(Request $request)
    {
        if( isset($_POST['deletes'])){
            $checks=$_POST['deletes'];
            $abc=count($checks);
            foreach ($checks as $check){
                $checking[]=  DB::table('documents')->where('id',$check)->value('state'); 
            } 
            for($i=0; $i<$abc; $i++){
                if ($checking[$i]=='Dostępny'){
                    return back()->withErrors(['Dokument nie był udostępniony']);
                }
            }
            DB::table('documents')->whereIn('id',$_POST['deletes'])->update(['state'=>"Dostępny"]);
            DB::table('shares')->whereIn('document_id',$_POST['deletes'])->update(['date_of_return'=>date('Y-m-d')]);
            return redirect()->route('main')->with('message', 'Udało się pomyślnie zwrócić dokumenty.');             
        }
        else{
            return back()->withErrors(['Nie zaznaczono żadnego dokumentu']);
        }
    }  
    
               
    public function allShares()
    {
        $share1 = Share::all();  
        return view('showShare',['sharesList' =>$share1]);
    }
                  
}
