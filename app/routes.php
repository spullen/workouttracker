<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return View::make('home');
});

Route::resource('register', 'RegistrationController', array('only' => array('create', 'store')));
Route::get('login', 'SessionController@create');
Route::post('login', 'SessionController@store');
Route::delete('logout', 'SessionController@destroy');

Route::group(array('before' => 'auth'), function() {
  Route::get('dashboard', 'DashboardController@index');

  Route::get('activity_metrics/{id?}', 'ActivityMetricsController@index');

  Route::resource('workouts', 'WorkoutsController');
  Route::resource('goals', 'GoalsController');
});
