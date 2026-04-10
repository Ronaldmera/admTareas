<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard');//pagina principal
        }

        return back()->withErrors(['email' => 'La contraseña o correo no coinciden'])->withInput(); //si hay errores se muestra este mensaje
    }

public function logout(Request $request)
    {
        Auth::logout(); // Esto cierra la sesión
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login'); // Redirige al login
    }
}
