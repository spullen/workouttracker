<?php

class WeightsController extends \BaseController {


  public function index() {
    $weights = Auth::user()
                ->weights()
                ->orderBy('created_at', 'desc')
                ->paginate(25);

    return View::make('weights.index')->with('weights', $weights);
  }

  public function create() {
    $weight = new Weight();
    return View::make('weights.create')->with('weight', $weight);
  }

  public function store() {
    $data = Input::only('amount');

    $weight = new Weight($data);

    $validator = Validator::make($data, array(
      'amount' => array('required', 'numeric', 'min:0.1', 'max:999.9')
    ));

    if($validator->fails()) {
      return View::make('weights.create')
                    ->withErrors($validator)
                    ->withInput(Input::all())
                    ->with('weight', $weight);
    }

    $weight->user()->associate(Auth::user());
    $weight->weight_unit = Auth::user()->weight_unit;
    $weight->save();

    Session::flash('message', 'Successfully logged weight.');
    return Redirect::to('dashboard');
  }

}