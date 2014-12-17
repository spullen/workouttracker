<?php

class GoalsController extends \BaseController {

	public function index() {
		$goals = Auth::user()
									->goals()
									->with('activity', 'metric')
									->orderBy('created_at', 'desc')
									->paginate(25);

		return View::make('goals.index')
							->with('goals', $goals);
	}

	public function create() {
		$goal = new Goal();
		return View::make('goals.create')->with('goal', $goal);
	}

	public function store() {
		$data = Input::only('title', 'activity_id', 'metric_id', 'target_amount', 'target_date');

		$goalCreate = new GoalCreateService(Auth::user(), $data);

		if(!$goalCreate->valid()) {
			return View::make('goals.create')
							->withErrors($goalCreate->errors())
							->withInput(Input::all())
							->with('goal', $goalCreate->goal());
		}

		$goalCreate->perform();

		Session::flash('message', 'Successfully logged goal!');
		return Redirect::action('DashboardController@index');
	}

	public function show($id) {
		$goal = Goal::findOrFail($id);

		$this->authorize('read', $goal);

		$workouts = $goal->workouts;
		return View::make('goals.show')
							->with('goal', $goal)
							->with('workouts', $workouts);
	}

	public function edit($id) {
		$goal = Goal::findOrFail($id);
		$this->authorize('update', $goal);
		return View::make('goals.edit')->with('goal', $goal);
	}

	public function update($id) {
		$data = Input::only('title', 'target_amount', 'target_date');

		$goal = Goal::findOrFail($id);

		$this->authorize('update', $goal);

		$goalUpdate = new GoalUpdateService($goal, $data);

		if(!$goalUpdate->valid()) {
			return View::make('goals.edit')
							->withErrors($goalUpdate->errors())
							->withInput(Input::all())
							->with('goal', $goalUpdate->goal());
		}

		$goalUpdate->perform();

		Session::flash('message', 'Successfully updated goal!');
		return Redirect::action('goals.show', array('id' => $id));
	}

	public function destroy($id) {
		$goal = Goal::findOrFail($id);
		
		$this->authorize('delete', $goal);

		$goal->workouts()->detach();
		$goal->delete();

		Session::flash('message', 'Successfully deleted goal.');
		return Redirect::action('DashboardController@index');
	}

}
