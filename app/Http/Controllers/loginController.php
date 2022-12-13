<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "usuario" => ["required"],
            "password" => ["required"],
        ]);
        if (Auth::attempt($credentials)) {
            if (\auth()->user()->status == 1) {
                $request->session()->regenerate();
                return redirect("/dashboard");
            }
        }
        return back()->withErrors(["validador"=>'Datos incorrectos']);
        return redirect("/")->withErrors($validator);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect("/");
    }
}
