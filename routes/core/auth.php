<?php
//=== CSGTAUTH
Route::get('logout', 'LoginController@logout');
Route::get('updatepassword', 'UpdatePasswordController@showUpdatePasswordForm');
Route::post('updatepassword', 'UpdatePasswordController@update');
Route::get('login', 'LoginController@showLoginForm')->name('login');

Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm');
Route::post('password/reset', 'ResetPasswordController@reset');


Route::get('oauth/{provider}', 'OAuthController@redirectToProvider');
Route::get('oauth/{provider}/callback', 'OAuthController@handleProviderCallback');
/*
//TWO STEP AUTH
Route::resource('twostep', 'twostepController', array('only'=>array('index', 'store')));
Route::post('twostep/validate', array('as' => 'twostep.validate', 'uses' => 'twostepController@validate'));
Route::get('twostep/enable', 'twostepController@enable');
Route::get('qr/{secret}', 'twostepController@getQr');

//EDITAR PERFIL
Route::group(array('before' => array('auth')), function() {
    Route::get('perfil/editar', 'perfilController@index');
    Route::post('perfil/save', 'perfilController@save');
});
*/
//=== CSGTAUTH
