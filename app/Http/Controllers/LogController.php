<?php

namespace App\Http\Controllers;

use Redirect;
use App\Http\Requests\LogRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LogController extends Controller
{
    public function show(){
          if (auth::check()){
            return view('main');
          }
          else {
            return view('login');}
    }
    
    public function authenticate(LogRequest $request){
        $credentials = $request->only('name','password');
        if (Auth::attempt($credentials)){
            return redirect()->intended('main');}
        else{
            return redirect()->route('log')->withErrors(['Błędny login lub hasło']);
        }
         
    }
    
    public function logout()
    {
        Auth::logout();       
        return redirect()->route('log')->with('message', 'Udało się pomyślnie wylogowac.'); 
    }
}
