<?php

class NotificationPreferencesController extends BaseController {

  public function edit() {
    $setting = Auth::user()->notificationPreference;

    return View::make('notification_preferences.edit')->with('setting', $setting);
  }

  public function update() {
    $setting = Auth::user()->notificationPreference;
    $setting->goal_reminder = Input::get('goal_reminder');
    $setting->missed_goal_target = Input::get('missed_goal_target');
    $setting->no_active_goals = Input::get('no_active_goals');
    $setting->save();

    Session::flash('message', 'Notification Preferences Updated');

    return Redirect::action('notifications.edit');
  }

}