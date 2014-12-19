<?php

class RegistrationController extends BaseController {

  public function create() {
    return View::make('registration.create');
  }

  public function store() {
    $rules = array(
      'first_name' => array('required'),
      'last_name' => array('required'),
      'sex' => array('required', 'in:m,f'),
      'birthdate' => array('required', 'regex:/\d{4}-\d{1,2}-\d{1,2}/', 'date_format:Y-m-d'),
      'weight' => array('numeric', 'min:0.1', 'max:999.9'),
      'email' => array('required', 'email', 'unique:users,email'),
      'password' => array('required', 'min:8', 'confirmed')
    );

    $validator = Validator::make(Input::all(), $rules);

    if($validator->fails()) {
      return Redirect::to('register/create')->withErrors($validator)->withInput(Input::except('password', 'password_confirmation'));
    } else {
      $user = new User();
      $user->first_name = Input::get('first_name');
      $user->last_name = Input::get('last_name');
      $user->sex = Input::get('sex');
      $user->birthdate = Input::get('birthdate');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));
      $user->save();

      if(Input::get('weight')) {
        $weight = new Weight();
        $weight->amount = Input::get('weight');
        $weight->user()->associate($user);
        $weight->save();
      }

      Auth::login($user);

      Session::flash('message', 'Successfully signed up!');

      return Redirect::action('dashboard');
    }
  }

}
