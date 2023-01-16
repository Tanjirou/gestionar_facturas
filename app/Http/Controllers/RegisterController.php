<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required','unique:users,email','max:30','email'],
            'password'=>['required','confirmed','min:6']
        ]);
        User::create([
            'name'=> $data['name'],
            'email' =>$data['email'],
            'password'=> Hash::make($data['password']),
            'tipo_usuario' =>2
        ]);
        //Auntenticar usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);
        //Otra forma
        auth()->attempt($request->only('email','password'));
        //Redireccionar
        return redirect()->route('dashboard');
    }
}
