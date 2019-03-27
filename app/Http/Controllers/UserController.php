<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;

class UserController extends BaseController {

    public function register(Request $req) {
        return view('user.register');
    }

    public function create(Request $req) {
        $userInput = $req->input('user');
        $userData = $userInput;
        $userData['password'] = Hash::make($userInput['password']);
        $user = User::create($userData);
        Auth::login($user);
        return redirect()->route('dashboard.index');
    }

    public function logout(Request $req) {
        Auth::logout();
        return redirect()->route('dashboard.index');
    }

    public function signin(Request $req) {
        return view('user.signin');
    }
    
    public function login(Request $req) {
        $userInput = $req->input('user');
        if (Auth::attempt($userInput)) {
            return redirect()->route('dashboard.index');
        }
        return redirect()->route('user.signin');
    }
}