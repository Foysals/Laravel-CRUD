<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Http\RedirectResponse;


class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function index2()
    {
        return view("register");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        //return redirect('login');
        return redirect()->route('login');

    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], ($request->remember) ? true : false)) {
          //  return redirect()->intended('dash');
        return redirect()->route('dash');

        } else {
            throw ValidationException::withMessages([
                "msg" => [trans('auth.failed')],
            ]);
        }
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ], [
                "name.required" => "Please type your name",
                "email.required" => "Please type your email",
                "email.unique" => "This email already exist",
                "password.required" => "Please type your password",
                "password.min" => "Please type password min 8 character",
            ]);

        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);

        $user = User::create([
            "name" => $name,
            "email" => $email,
            "user_type" => 2,
            "password" => $password,
        ]);
        if ($user) {

            // auto login
            auth()->login($user);
        
        return redirect()->route('dash');

        } else {
            back()->with("msg", "Registration Failed!!!");
        }


    }
}