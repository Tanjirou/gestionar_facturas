<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required','email'],
            'password'=>['required']
        ]);

        if(!auth()->attempt(['email'=>$data['email'],'password'=>$data['password']]))
        {
            return back()->with('mensaje','Credenciales Incorrectas');
        }
        return redirect()->route('dashboard');
    }
}
