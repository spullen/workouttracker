<?php

class UserSettingsController extends BaseController {

  public function edit() {
    $setting = Auth::user()->userSetting;

    return View::make('user_settings.edit')->with('setting', $setting);
  }

  public function update() {

  }

}