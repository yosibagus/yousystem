<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Email tidak boleh dikosongi',
            'password.required' => 'Password tidak boleh dikosongi'
        ]);

        $login = [
            'nim_mahasiswa' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($login)) {

            if (Auth::user()->role == 1) {
                return redirect('/home');
            } else {
                return redirect('/admin');
            }
        } else {
            return redirect('/')->with('error', 'Username / Password tidak ditemukan');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
