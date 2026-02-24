<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:3',
        ]);

        session([
            'username' => $request->username
        ]);

        return redirect('/app');
    }

    public function appPage()
    {
        if (!session()->has('username')) {
            return redirect('/');
        }

        return view('app');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
