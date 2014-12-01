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
		
	}

	public function show($id) {
		
	}

	public function edit($id) {
		
	}

	public function update($id) {
		
	}

	public function destroy($id) {
		
	}

}
