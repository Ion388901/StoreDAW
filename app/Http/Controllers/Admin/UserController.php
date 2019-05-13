<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;

class UserController extends BaseController {

    /**
     * 
     * Vista del registro de un nuevo usuario tipo admin
     * 
     */
    public function register(Request $req) {
        return view('admin.user.register');
    }

    /**
     * 
     * Creación del usuario tipo admin
     * 
     */
    public function create(Request $req) {
        $userInput = $req->input('user');
        $userData = $userInput;
        $userData['password'] = Hash::make($userInput['password']);
        $user = User::create($userData);
        Auth::login($user);
        return redirect()->route('admin.dashboard.index');
    }

    /**
     * 
     * Cierre de sesión de un usuario tipo admin
     * 
     */
    public function logout(Request $req) {
        Auth::logout();
        return redirect()->route('admin.dashboard.index');
    }

    /**
     * 
     * Vista de registro de inicio de sesión de usuario tipo admin
     * 
     */
    public function signin(Request $req) {
        return view('admin.user.signin');
    }
    
    /**
     * 
     * Función de inicio de sesión de un usuario tipo admin
     * 
     */
    public function login(Request $req) {
        $userInput = $req->input('user');
        if (Auth::attempt($userInput)) {
            return redirect()->route('admin.dashboard.index');
        }
        return redirect()->route('admin.user.signin');
    }
}