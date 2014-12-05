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

		$goalCreate = new GoalCreateService(Auth::user(), $data);

		if(!$goalCreate->valid()) {
			return Redirect::action('goals.create')
							->withErrors($goalCreate->errors())
							->withInput(Input::all());
		}

		$goalCreate->perform();

		Session::flash('message', 'Successfully logged goal!');
		return Redirect::action('goals.index');
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
			return Redirect::action('goals.edit', array($id))
							->withErrors($validator)
							->withInput(Input::all());
		} else {
			$goal->title = $data['title'];
			$goal->target_amount = $data['target_amount'];
			$goal->target_date = $data['target_date'];

			// determine if the goal's accomplished state has changed
			$goal->determineAccomplishedState();

			$goal->save();

			Session::flash('message', 'Successfully updated goal!');
			return Redirect::action('goals.index');
		}
	}

	public function destroy($id) {
		$goal = Goal::find($id);
		
		$this->authorize('delete', $goal);

		$goal->workouts()->detach();
		$goal->delete();

		Session::flash('message', 'Successfully deleted goal.');
		return Redirect::action('goals.index');
	}

}
