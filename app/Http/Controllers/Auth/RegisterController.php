<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  protected $redirectTo = '/';

  public function __construct() {
    $this->middleware('guest');
  }

  public function showRegistrationForm() {
    if (config('csgtlogin.registro.habilitado', false) == false) {
      dd('Registro no habilitado.');
    }
    return view('auth.register')
      ->with('icon','user-plus');
  }

  protected function validator(array $data) {
    return Validator::make($data, [
      'nombre'   => 'required|max:255',
      'email'    => 'required|email|max:255|unique:authusuarios',
      'password' => 'required|min:6|confirmed',
    ]);
  }

  protected function create(array $data) {
    if (config('csgtlogin.registro.habilitado', false) == false) {
      dd('Registro no habilitado.');
    }
    
    return User::create([
        'nombre'   => $data['nombre'],
        'email'    => $data['email'],
        'password' => bcrypt($data['password']),
    ]);
  }

}
