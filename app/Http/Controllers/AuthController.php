<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }

        return view('login');
    }

    public function login_action(UserRequest $request)
    {

        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($validator)) {
            return redirect(route('home'));
        }
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('register');
    }

    public function register_action(StoreUserRequest $request)
    {

        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']);

        if (User::create($data)) {
            return redirect(route('login'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
