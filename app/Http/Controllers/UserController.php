<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;

class UserController extends BaseController {

    /**
     * 
     * Vista de la creación de un usuario tipo cliente
     * 
     */
    public function register(Request $req) {
        return view('user.register');
    }

    /**
     * 
     * Creación de un usuario tipo cliente
     * 
     */
    public function create(Request $req) {
        $userInput = $req->input('user');
        $userData = $userInput;
        $userData['password'] = Hash::make($userInput['password']);
        $user = User::create($userData);
        Auth::login($user);
        return redirect()->route('dashboard.index');
    }

    /**
     * 
     * Función de logout de la sesión del usuario cliente
     * 
     */
    public function logout(Request $req) {
        Auth::logout();
        return redirect()->route('dashboard.index');
    }

    /**
     * 
     * Vista de registro de inicio de sesión de un usuario cliente
     * 
     */
    public function signin(Request $req) {
        return view('user.signin');
    }
    
    /**
     * 
     * Cierre de
     * 
     */
    public function login(Request $req) {
        $userInput = $req->input('user');
        if (Auth::attempt($userInput)) {
            return redirect()->route('dashboard.index');
        }
        return redirect()->route('user.signin');
    }
}