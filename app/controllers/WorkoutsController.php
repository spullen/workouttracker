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

		$workout = new Workout($data);
		
		$rules = array(
			'activity_id' => array('required', 'numeric', 'exists:activities,id'),
			'metric' => array('required', 'in:Distance,Reps,Count'),
			'amount' => array('required', 'numeric', 'min:0.01'),
			'duration' => array('required', 'numeric', 'min:0.01')
		);

		$validator = Validator::make($data, $rules);

		if($validator->fails()) {
			return Redirect::action('workouts.create')
							->withErrors($validator)
							->withInput(Input::all());
		} else {
			$workout->user()->associate(Auth::user());
			$workout->activity_id = $data['activity_id'];
			$workout->metric = $data['metric'];
			$workout->amount = $data['amount'];
			$workout->duration = $data['duration'];
			$workout->notes = $data['notes'];
			$workout->save();

			// find all active goals for user with activity and metric
			//$goals = 

			Session::flash('message', 'Successfully logged workout!');
			return Redirect::action('workouts.index');
		}
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

		$rules = array(
			'amount' => array('required', 'numeric', 'min:0.01'),
			'duration' => array('required', 'numeric', 'min:0.01')
		);

		$validator = Validator::make($data, $rules);

		if($validator->fails()) {
			return Redirect::action('workouts.edit')
							->withErrors($validator)
							->withInput(Input::all());
		} else {
			$workout->amount = $data['amount'];
			$workout->duration = $data['duration'];
			$workout->notes = $data['notes'];
			$workout->save();

			Session::flash('message', 'Successfully updated workout!');
			return Redirect::action('workouts.index');
		}
	}

	public function destroy($id) {
		$workout = Workout::find($id);

		$this->authorize('delete', $workout);

		$workout->delete();

		Session::flash('message', 'Successfully deleted workout.');
		return Redirect::action('workouts.index');
	}

}
