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
    return Redirect::to('dashboard');
  }

}