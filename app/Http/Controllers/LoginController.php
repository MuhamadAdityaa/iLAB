<?php

namespace App\Http\Controllers;

use App\Models\ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $ruangan = ruangan::all();

        // dd($ruangan);
        return view('login', compact('ruangan'));

    }

    public function login()
    {
        return view('loginForm');
    }

    public function loginSubmit(Request $request)
    {
        // Logic for handling login submission
        $username = $request->username;
        $password = $request->password;

        // Cek kredensial
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); 
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
