<?php

Route::get('/', function() {
  if(Auth::check()) {
    return Redirect::action('dashboard');
  }
	return View::make('home', array('main_wrapper_class' => 'home-wrapper'));
});

Route::get('about', function() {
  return View::make('about');
});

Route::resource('register', 'RegistrationController', array('only' => array('create', 'store')));
Route::get('login', 'SessionController@create');
Route::post('login', 'SessionController@store');
Route::delete('logout', 'SessionController@destroy');

Route::group(array('before' => 'auth'), function() {
  Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));

  Route::get('activity_metrics/{id?}', 'ActivityMetricsController@index');

  Route::get('password', array('as' => 'password.edit', 'uses' => 'PasswordController@edit'));
  Route::put('password', array('as' => 'password.update', 'uses' => 'PasswordController@update'));

  Route::get('settings', array('as' => 'settings.edit', 'uses' => 'UserSettingsController@edit'));
  Route::put('settings', array('as' => 'settings.update', 'uses' => 'UserSettingsController@update'));

  Route::get('notifications', array('as' => 'notifications.edit', 'uses' => 'NotificationPreferencesController@edit'));
  Route::put('notifications', array('as' => 'notifications.update', 'uses' => 'NotificationPreferencesController@update'));

  Route::resource('weight', 'WeightsController', array('only' => array('index', 'create', 'store')));
  Route::resource('workouts', 'WorkoutsController');
  Route::resource('goals', 'GoalsController');
});
