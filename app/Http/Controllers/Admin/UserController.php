<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;

class UserController extends BaseController {

    public function register(Request $req) {
        return view('admin.user.register');
    }

    public function create(Request $req) {
        $userInput = $req->input('user');
        $userData = $userInput;
        $userData['password'] = Hash::make($userInput['password']);
        $user = User::create($userData);
        Auth::login($user);
        return redirect()->route('admin.dashboard.index');
    }

    public function logout(Request $req) {
        Auth::logout();
        return redirect()->route('admin.dashboard.index');
    }

    public function signin(Request $req) {
        return view('admin.user.signin');
    }
    
    public function login(Request $req) {
        $userInput = $req->input('user');
        if (Auth::attempt($userInput)) {
            return redirect()->route('admin.dashboard.index');
        }
        return redirect()->route('admin.user.signin');
    }
}