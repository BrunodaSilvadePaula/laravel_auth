<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
//Multi Auth
Route::group(['middleware' => 'admin'], function () {

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/admin', 'AdminController@index');
    });


    Route::get('/admin/login', 'AdminController@login');
    Route::post('/admin/login', 'AdminController@postLogin');

    Route::get('/admin/logout', 'AdminController@logout');
});

//Auth
Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/', function () {
        return view('welcome');
    });
});

//Model bind
/*
  Route::get('user/{user}', function(\App\User $user){
  //$user = App\User::find($id);
  dd($user->toArray());


  });
 */

Route::get('admin/{admin}', function(\App\Admin $admin) {
    //$user = App\User::find($id);   
    dd($admin->toArray());
});

Route::get('user/{user}', 'UserController@index');

//Middlewere Groups
Route::group(['middleware' => 'md-test'], function () {
    
});


//Rate Limit
//60 minutops do mesmo IP - Padrão
Route::group(['middleware' => 'throttle:4,1'], function () {

    Route::get('/rate', function () {
        return 'Avcessando';
    });
});
