<?php

class RegistrationController extends BaseController {

  public function create() {
    return View::make('registration.create');
  }

  public function store() {
    $rules = array(
      'first_name' => 'required',
      'last_name' => 'required',
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
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));
      $user->save();

      Auth::login($user);

      Session::flash('message', 'Successfully signed up!');

      return Redirect::to('/');
    }
  }

}
