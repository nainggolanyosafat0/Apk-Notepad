<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,name',
            'password' => 'required|min:4',
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->username.'@local.test',
            'password' => Hash::make($request->password),
        ]);

        return redirect('/app');
    }
}
