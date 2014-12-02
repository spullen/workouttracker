<?php

class GoalsController extends \BaseController {

	public function index() {
		$goals = Auth::user()
									->goals()
									->with('activity')
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
		$data = Input::only('title', 'activity_id', 'metric', 'targetAmount', 'targetDate');

		$goal = new Goal($data);

		$rules = array(
			'activity_id' => array('required', 'numeric', 'exists:activities,id'),
			'metric' => array('required', 'in:Distance,Reps,Count'),
			'title' => array('required'),
			'targetAmount' => array('required', 'numeric', 'min:0.01'),
			'targetDate' => array('required', 'date_format:Y-m-d', 'after:' . Carbon::yesterday()->toDateString())
		);

		$validator = Validator::make($data, $rules);

		if($validator->fails()) {
			return Redirect::action('goals.create')
							->withErrors($validator)
							->withInput(Input::all());
		} else {
			$goal->user()->associate(Auth::user());
			$goal->activity_id = $data['activity_id'];
			$goal->metric = $data['metric'];
			$goal->targetAmount = $data['targetAmount'];
			$goal->targetDate = $data['targetDate'];
			$goal->save();

			Session::flash('message', 'Successfully logged goal!');
			return Redirect::action('goals.index');
		}
	}

	public function show($id) {
		$goal = Goal::find($id);
		return View::make('goals.show')
							->with('goal', $goal)
							->with('workouts', $workouts);
	}

	public function edit($id) {
		$goal = Goal::find($id);
		return View::make('goals.edit')->with('goal', $goal);
	}

	public function update($id) {
		$data = Input::only('title', 'targetAmount', 'targetDate');

		$goal = Goal::find($id);

		$rules = array(
			'title' => array('required'),
			'targetAmount' => array('required', 'numeric', 'min:0.01'),
			'targetDate' => array('required', 'date_format:Y-m-d', 'after:' . Carbon::yesterday()->toDateString())
		);

		$validator = Validator::make($data, $rules);

		if($validator->fails()) {
			return Redirect::action('goals.edit')
							->withErrors($validator)
							->withInput(Input::all());
		} else {
			$goal->targetAmount = $data['targetAmount'];
			$goal->targetDate = $data['targetDate'];
			$goal->save();

			Session::flash('message', 'Successfully updated goal!');
			return Redirect::action('goals.index');
		}
	}

	public function destroy($id) {
		$goal = Goal::find($id);
		$goal->delete();

		Session::flash('message', 'Successfully deleted goal.');
		return Redirect::action('goals.index');
	}

}
