<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'statu' => 'basarili auth oldu ama burada ne dönecem'
            ]);
        };

        return response()->withErrors([
            'email' => 'email de bir hata var knk'
        ]);
    }
}
