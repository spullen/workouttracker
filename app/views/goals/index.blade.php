@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Goals</h1>
  </div>
</div>
@stop

@section('content')
<div class="container">
  <p><a href="{{ URL::route('goals.create') }}">Create goal</a></p>

  @if(count($goals))
    <table class="table table-striped table-bordered table-responsive">
      <thead>
        <tr>
          <th>Title</th>
          <th>Activity</th>
          <th>Metric</th>
          <th>Current Amount</th>
          <th>Target Amount</th>
          <th>Target Date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($goals as $goal)
          <tr>
            <td><a href="{{ URL::route('goals.show', array($goal->id)) }}">{{ $goal->title }}</a></td>
            <td>{{ $goal->activity->name }}</td>
            <td>{{ $goal->metric }}</td>
            <td>{{ $goal->current_amount }}</td>
            <td>{{ $goal->target_amount }}</td>
            <td>{{ $goal->target_date }}</td>
            <td>
              @if(isset($goal->accomplished_date))
                Accomplished on: {{ $goal->accomplished_date }}! Woot!
              @else
                {{ $goal->percentAccomplished() }}%
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="pagination">
      {{ $goals->links() }}
    </div>
  @else
    <p>
      You don't have any goals! Setting goals is a great way to get motivated so <a href="{{ URL::route('goals.create') }}">create one!</a>
    </p>
  @endif
</div>
@stop