<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
public function create() {
        return view('auth.login');
    }

 public function store(Request $request) {
     $validated = $request->validate([
        'email' =>['required', 'email'],
        'password' => ['required']]);   

    if (!Auth::attempt($validated)){
        return back()->withErrors(['email'=> 'Informations incorrectes', ])->onlyInput('email');
    }
    $request->session()->regenerate();
    
    }
       

}
