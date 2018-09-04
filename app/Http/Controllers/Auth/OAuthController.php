<?php

namespace App\\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Redirect;
use Exception;
use Config;
use Auth;
use Socialite;
use App\Models\Authusuario;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web','guest']);
    }

    public function redirectToProvider(Request $request, $aProvider)
    {
        return Socialite::driver($aProvider)->redirect();
    }

    public function handleProviderCallback(Request $request, $aProvider)
    {
        try {
            $user = Socialite::driver($aProvider)->user();
            $token = $user->token;

            // All Providers
            //$user->getId();
            //$user->getNickname();
            //$user->getName();
            //$user->getEmail();
            //$user->getAvatar();
            $usuario = Authusuario::where($aProvider . 'id', $user->getId())->first();
            if (!$usuario) {
                $usuario = Authusuario::where('email', $user->getEmail())->first();
            }
            if (!$usuario) {
                if (config('csgtlogin.facebook.autoregistro', true)) {
                    $usuario = new Authusuario;
                    $usuario->{$aProvider . 'id'} = $user->getId();
                    $usuario->email = $user->getEmail();
                    $usuario->nombre = $user->getName();
                    $usuario->activo = config('csgtlogin.facebook.autoregistro', false)?true:false;
                    $usuario->save();
                } else {
                    $request->session()->flash('error', 'No fue posible autenticar');
                    return redirect()->to('/login');
                }
            } else {
                $usuario->email  = $user->getEmail();
                $usuario->nombre = $user->getName();
                $usuario->save();
            }

            Auth::loginUsingId($usuario->usuarioid);
            if (Auth::user()->activo == 0) {
                Auth::logout();
                $request->session()->flash('error', 'Usuario deshabilitado');
                return redirect()->to('/login');
            }
            return redirect()->intended('/');
        } catch (Exception $e) {
            $request->session()->flash('error', 'Error autenticando: ' . $e->getMessage());
            return redirect()->to('/login');
        }
    }
}
