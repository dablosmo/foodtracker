<?php

use App\User;

Route::get('/', 'WelcomeController@index');

Route::get('signup', function()
{
	return view('signup');
});

Route::post('signup', function()
{
  $validation = User::validate(Request::all());

  if ($validation->passes()) {
    $user = new User();
    $user->name = Request::input('name');
    $user->email = Request::input('email');
    $user->password = Hash::make(Request::input('password'));
    $user->save();

    //    return redirect('login');
    Auth::loginUsingId($user->id);
    return redirect('dashboard');
  }

  return redirect('signup')->withInput()->withErrors($validation->errors());
});

Route::get('login', function()
{
  return view('login');
});

Route::post('login', function()
{
  $remember_me = Request::input('remember_me') === 'on' ? true : false;

  if (Auth::attempt(['email' => Request::input('email'), 'password' => Request::input('password')], $remember_me)) {
//    return redirect('dashboard');
    return redirect()->intended();
  }

  return redirect('login');
});

Route::get('dashboard', function()
{
  if (Auth::check()) {
    return view('dashboard');
  }

  return redirect('login');
});

Route::get('dashboard', ['middleware' => 'auth', function()
{
  return view('dashboard');
}]);

Route::get('logout', function()
{
  Auth::logout();
  return redirect('login');
});


Route::get('password', ['middleware' => 'auth', function()
{
  dd('edit password page');
}]);
