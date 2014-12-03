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
		$data = Input::only('title', 'activity_id', 'metric', 'target_amount', 'target_date');

		$goal = new Goal($data);

		$rules = array(
			'activity_id' => array('required', 'numeric', 'exists:activities,id'),
			'metric' => array('required', 'in:Distance,Reps,Count'),
			'title' => array('required'),
			'target_amount' => array('required', 'numeric', 'min:0.01'),
			'target_date' => array('required', 'regex:/\d{4}-\d{1,2}-\d{1,2}/', 'date_format:Y-m-d', 'after:' . Carbon::yesterday('US/Eastern')->toDateString())
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
			$goal->target_amount = $data['target_amount'];
			$goal->target_date = $data['target_date'];
			$goal->save();

			Session::flash('message', 'Successfully logged goal!');
			return Redirect::action('goals.index');
		}
	}

	public function show($id) {
		$goal = Goal::find($id);

		$this->authorize('read', $goal);

		$workouts = $goal->workouts;
		return View::make('goals.show')
							->with('goal', $goal)
							->with('workouts', $workouts);
	}

	public function edit($id) {
		$goal = Goal::find($id);
		$this->authorize('update', $goal);
		return View::make('goals.edit')->with('goal', $goal);
	}

	public function update($id) {
		$data = Input::only('title', 'target_amount', 'target_date');

		$goal = Goal::find($id);

		$this->authorize('update', $goal);

		$rules = array(
			'title' => array('required'),
			'target_amount' => array('required', 'numeric', 'min:0.01'),
			'target_date' => array('required', 'regex:/\d{4}-\d{1,2}-\d{1,2}/', 'date_format:Y-m-d', 'after:' . Carbon::yesterday('US/Eastern')->toDateString())
		);

		$validator = Validator::make($data, $rules);

		if($validator->fails()) {
			return Redirect::action('goals.edit')
							->withErrors($validator)
							->withInput(Input::all());
		} else {
			$goal->title = $data['title'];
			$goal->target_amount = $data['target_amount'];
			$goal->target_date = $data['target_date'];
			$goal->save();

			Session::flash('message', 'Successfully updated goal!');
			return Redirect::action('goals.index');
		}
	}

	public function destroy($id) {
		$goal = Goal::find($id);
		
		$this->authorize('delete', $goal);

		$goal->delete();

		Session::flash('message', 'Successfully deleted goal.');
		return Redirect::action('goals.index');
	}

}
