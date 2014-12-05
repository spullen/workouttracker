<?php

class WorkoutsController extends \BaseController {

	public function index() {
		$workouts = Auth::user()
									->workouts()
									->with('activity')
									->orderBy('created_at', 'desc')
									->paginate(25);

		return View::make('workouts.index')
							->with('workouts', $workouts);
	}

	public function create() {
		$workout = new Workout();
		return View::make('workouts.create')->with('workout', $workout);
	}

	public function store() {
		$data = Input::only('activity_id', 'metric', 'amount', 'duration', 'notes');

		$workoutCreate = new WorkoutCreateService(Auth::user(), $data);

		if(!$workoutCreate->valid()) {
			return Redirect::action('workouts.create')
						->withErrors($workoutCreate->errors())
						->withInput(Input::all());
		}

		$workoutCreate->perform();

		Session::flash('message', 'Successfully logged workout!');
		return Redirect::action('workouts.index');
	}

	public function show($id) {
		$workout = Workout::find($id);
		$this->authorize('read', $workout);
		return View::make('workouts.show')->with('workout', $workout);
	}

	public function edit($id) {
		$workout = Workout::find($id);
		$this->authorize('update', $workout);
		return View::make('workouts.edit')->with('workout', $workout);
	}

	public function update($id) {
		$data = Input::only('amount', 'duration', 'notes');

		$workout = Workout::find($id);

		$this->authorize('update', $workout);

		$workoutUpdate = new WorkoutUpdateService($workout, $data);

		if(!$workoutUpdate->valid()) {
			return Redirect::action('workouts.edit')
						->withErrors($workoutUpdate->errors())
						->withInput(Input::all());
		}

		$workoutUpdate->perform();

		Session::flash('message', 'Successfully updated workout!');
		return Redirect::action('workouts.index');
	}

	public function destroy($id) {
		$workout = Workout::find($id);

		$this->authorize('delete', $workout);

		// remove the amount from all of the goals
		$goals = $workout->goals()->get();

		foreach($goals as $goal) {
			$goal->current_amount -= $workout->amount;
			$goal->determineAccomplishedState();
			$goal->save();

			// detach from workout (the cascase delete should get this, but for good measure)
			$goal->workouts()->detach($workout->id);
		}

		$workout->delete();

		Session::flash('message', 'Successfully deleted workout.');
		return Redirect::action('workouts.index');
	}

}
