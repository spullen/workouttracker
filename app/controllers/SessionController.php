<?php

class SessionController extends BaseController {

  public function create() {
    return View::make('session.create');
  }

  public function store() {
    $credentials = Input::only('email', 'password');
    $remember = Input::has('remember');
    if(Auth::attempt($credentials, $remember)) {
      Session::flash('message', 'Successfully logged in.');
      return Redirect::intended('/');
    }
    Session::flash('alert', 'Invalid email/password combination.');
    return Redirect::to('/login');
  }

  public function destroy() {
    Auth::logout();
    Session::flash('message', 'You are now logged out.');
    return Redirect::to('/');
  }

}