<?php

class UserSettingsController extends BaseController {

  public function edit() {
    $setting = Auth::user()->userSetting;

    return View::make('user_settings.edit')->with('setting', $setting);
  }

  public function update() {
    $setting = Auth::user()->userSetting;

    $tz = new Camroncade\Timezone\Timezone();

    $rules = array(
      'timezone' => array('required', 'in:' . implode(',', array_values($tz->timezoneList))),
      'weight_unit' => array('required', 'in:lb,kg'),
      'distance_unit' => array('required', 'in:mi,km')
    );

    $validator = Validator::make(Input::all(), $rules);

    if($validator->fails()) {
      return View::make('user_settings.edit')
              ->withErrors($validator)
              ->withInput(Input::all())
              ->with('setting', $setting);
    } else {
      

      $setting->timezone = Input::get('timezone');
      $setting->weight_unit = Input::get('weight_unit');
      $setting->distance_unit = Input::get('distance_unit');
      $setting->save();

      Session::flash('message', 'User Settings Updated');

      return Redirect::action('settings.edit');
    }
  }

}