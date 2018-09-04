<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session, Hash, Redirect, Crypt, DB, Exception;
use Carbon\Carbon;

class UpdatePasswordController extends Controller {
  /*
  |--------------------------------------------------------------------------
  | Password Update Controller
  |--------------------------------------------------------------------------
  |
  | Controlador responsable de manejar la actualizacion de una password
  | vencida y continuar con el proceso de login.
  |
  */

  public function __construct() {
    $this->middleware('guest');
  }

  public function password() {
    return 'password';
  }

  public function showUpdatePasswordForm(Request $request) {
    return view('auth.passwords.update')
      ->with('id', $request->id)
      ->with('icon', 'clock-o');
  }

  public function update(Request $request) {
    $this->validate($request, [
      'password' => 'required|confirmed|min:6',
    ]);
    
    $userarray = [];
    $id = $request->id;
    try {
      $id = Crypt::decrypt($id);
    } 
    catch (Exception $e) {
      return $this->sendFailedUpdateResponse($request);
    }
 
    $dias = (int)config('csgtlogin.vencimiento.dias');
    if ($dias == 0) {
      $fecha = null;
    }
    else {
      $fecha = Carbon::now(config('app.timezone'))->addDays($dias);
    }

    $password = $request->password;

    if(config('csgtlogin.vencimiento.repetirpasswords.habilitado')) {
      $historiales = DB::table(config('csgtlogin.repetirpasswords.tabla'))
        ->where(config('csgtlogin.repetirpasswords.campousuario'), $id)
        ->pluck(config('csgtlogin.repetirpasswords.campopassword'));

      foreach($historiales as $historial) {
        if(Hash::check($password, $historial)) {
          return redirect()->back()
            ->withErrors([
              $this->password() => trans('login.passwordrepetida'),
            ]);
        }
      }
    }

    $userarray['password'] = Hash::make($password);
    $userarray[config('csgtlogin.vencimiento.campo')] = $fecha;

    $class = config('auth.providers.users.model');
    $user  = $class::find($id);
    $user->update($userarray);
    $user->save();

    if(config('csgtlogin.vencimiento.repetirpasswords.habilitado')) {
      DB::table(config('csgtlogin.repetirpasswords.tabla'))->insert([
        config('csgtlogin.repetirpasswords.campousuario')  => $id,
        config('csgtlogin.repetirpasswords.campopassword') => $userarray['password'],
        'created_at'                                       => date_create(),
        'updated_at'                                       => date_create(),
      ]);
    }

    Auth::loginUsingId($id);
    return Redirect::to('/');
  }

  protected function sendFailedUpdateResponse(Request $request) {
    return redirect()->back()
      ->withInput($request->only('id'))
      ->withErrors([
        $this->password() => trans('auth.failed'),
      ]);
  }
}
