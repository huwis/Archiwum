<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegRequest;
use App\Models\User;

class RegController extends Controller
{
    
    public function show(){
        if (auth::check()){
            return view('main');
        }
        else {
          return view('register');        
        }
    }
    
    public function store(RegRequest $request){
        $logg = new User;
        $logg->first_name = $request->input('first_name');
        $logg->surname = $request->input('surname');
        $logg->pesel = $request->input('pesel');
        $logg->name = $request->input('name');
        $logg->password = bcrypt($request->input('password'));
        $logg->save();
               
        return back()->with('message', 'Udało się pomyślnie zarejestrować użytkownika.');
    }
}
