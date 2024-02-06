<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;



class AuthController extends Controller
{
    //login
    public function getLogin()
    {
        return view('auth/login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only( 'email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return redirect('/login')->with(
            'login_error' ,'メールアドレスかパスワードが間違っています。',
        );

    }

    //register
    public function getRegister()
    {
        return view('auth/register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $user=User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('/thanks');

    }

    public function getLogout()
    {
        Auth::logout();
        return redirect("/")->with('logout','ログアウトしました');
    }

    public function getThanks()
    {
        return view('thanks');
    }
}
