<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
     }

     public function store(){
        if(auth()->attempt(request(['email','password'])) == false)
        {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again',
            ]);

        }
        return redirect()->to('/'); 
     }

     public function destroy(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->to('/');
    }
}
