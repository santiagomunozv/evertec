<?php

namespace App\Http\Controllers\Auth;

use App\Auth\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest',['only'=>'mostrarLoginForm']);
    }

    /**
     * Controlador empleado para recibir y procesar las solicitudes de logueo en la aplicación
     */
    public function login(){
        $credenciales = $this->validate(request(), [
            'login' => 'required|string',
            'password' => 'required|string'
        ]);
        //si no se tienen datos del usuario retorna al login
        if( Auth::attempt($credenciales) && AuthService::setSessionModels()){
            return redirect("/");
        }
        self::endSessionObjects();
        return back()->withErrors(['authFailed' => trans('auth.failed')]);
    }
    
    public function logout(){
        self::endSessionObjects();
        return redirect('/login');
    }

    public function mostrarLoginForm(){
        session(['link' => url()->previous()]); 
        return view('auth.login');  
    }

    private static function endSessionObjects(){
        Session::flush();
        Auth::logout();
    }
}