<?php

class PasswordController extends BaseController {

  public function edit() {
    return View::make('password.edit');
  }

  public function update() {
    $user = Auth::user();
    $data = Input::only('current_password', 'password', 'password_confirmation');

    $validator = Validator::make($data, array(
      'current_password' => array('required'),
      'password' => array('required', 'min:8', 'confirmed')
    ));

    if($validator->fails()) {
      return View::make('password.edit')->withErrors($validator);
    }

    if(!Auth::validate(array('email' => $user->email, 'password' => $data['current_password']))) {
      Session::flash('alert', trans('validation.invalid_password'));
      return View::make('password.edit');
    }

    $user->password = Hash::make($data['password']);
    $user->save();

    Session::flash('message', 'Successfully changed password.');

    return Redirect::action('dashboard');
  }

}