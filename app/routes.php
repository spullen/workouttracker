<?php

Route::get('/', function() {
  if(Auth::check()) {
    return Redirect::action('dashboard');
  }
	return View::make('home');
});

Route::resource('register', 'RegistrationController', array('only' => array('create', 'store')));
Route::get('login', 'SessionController@create');
Route::post('login', 'SessionController@store');
Route::delete('logout', 'SessionController@destroy');

Route::group(array('before' => 'auth'), function() {
  Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));

  Route::get('activity_metrics/{id?}', 'ActivityMetricsController@index');

  Route::get('settings', array('as' => 'settings.edit', 'uses' => 'UserSettingsController@edit'));
  Route::put('settings', array('as' => 'settings.update', 'uses' => 'UserSettingsController@update'));

  Route::resource('weight', 'WeightsController', array('only' => array('index', 'create', 'store')));
  Route::resource('workouts', 'WorkoutsController');
  Route::resource('goals', 'GoalsController');
});
