<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth, Validator,Hash;

class ProfileController extends Controller {
	public function index() {
		$me = Auth::user();
		return view('auth.profile')
			->with('me', $me);
	}

	public function store(Request $request) {

		$reglas = [
			'nombre'         => 'required',
			'passwordactual' => 'required|min:6',
			'foto'           => 'image|dimensions:width=100,height=100'
		];

		$mensajes = [
			'nombre.required'         => trans('login.nombrerequerido'),
			'passwordactual.required' => trans('login.passwordrequerida'),
			'passwordactual.min'      => trans('login.passwordmin'),
			'foto.image'              => trans('login.perfilimagen'),
			'foto.dimensions'         => trans('login.perfiltamano'),
		];

		if ($request->password != '') {
			$reglas['password'] = 'required|confirmed|min:6';

			$mensajes['password.required']  = trans('login.passwordrequerida');
			$mensajes['password.min']       = trans('login.passwordmin');
			$mensajes['password.confirmed'] = trans('login.passwordnoigual');
		}

		$validator = Validator::make($request->all(), $reglas, $mensajes);

    $validator->after(function ($validator) use ($request) {
    	if (!Hash::check($request->passwordactual, Auth::user()->password)) { 
		  	$validator->errors()->add('passwordactual', trans('login.passwordincorrecta'));
			}
		});

    if ($validator->fails()) {
    	return redirect()->back()->withErrors($validator);
    }


    $user = Auth::user();

    if ($request->file('foto')) {
    	$foto = file_get_contents($request->file('foto'));
    	$user->avatar = base64_encode($foto);
    }

    if ($request->password != '') {
    	$user->password = Hash::make($request->password);
  	}
    $user->nombre   = $request->nombre;
    $user->save();

    session()->flash('message', trans('login.perfilactualizado'));
		session()->flash('type', 'info');

    return redirect()->to('/');
	}
}

