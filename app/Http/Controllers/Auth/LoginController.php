<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use DateTime, DateTimeZone, Crypt;

class LoginController extends Controller {
    protected $table = 'authusuarios';

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesUsers;

    public function showLoginForm() {
        return view('auth.login')
            ->with('icon', 'user')
            ->with('titulo', 'Iniciar sesión');
    }

    //Override para operar el login
    public function login(Request $request) {
        $this->validateLogin($request);
        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);
        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            if (config('csgtlogin.vencimiento.habilitado')) {
                $campo = Auth::user()->{config('csgtlogin.vencimiento.campo')};
                if (!$campo) return $this->sendLoginResponse($request);

                $tz    = new DateTimeZone(config('app.timezone'));
                $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $campo, $tz);

                $ahora = new DateTime;
                $ahora->setTimezone($tz);

                if ($fecha>$ahora) return $this->sendLoginResponse($request);

                $id = Crypt::encrypt(Auth::id());
                Auth::logout();
                return redirect('/updatepassword?id=' . $id);
            }
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if (! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }


    public function logout(Request $request) {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate(true);
        return redirect(config('csgtlogin.redirectlogout','/'));
    }

    public function redirectToProvider($aProvider) {
        return Socialite::driver($aProvider)->redirect();
    }

    /**
    * Create a new authentication controller instance.
    *
    * @return void
    */
    public function __construct() {
        $this->middleware(['guest'])
            ->except(['logout','auth/logout', 'updatepassword']);
    }

    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data) {
        return Validator::make($data, [
            'email'    => 'required|email|max:255|unique:' . $this->table,
            'password' => 'required|confirmed|min:6',
        ]);
    }

}
