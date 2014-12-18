 @extends('layouts.main')

@section('content')
<div class="container">
  <p><a href="{{ URL::route('weight.create') }}">Log Weight</a></p>

  @if(count($weights))
    <table class="table table-striped table-bordered table-responsive">
      <thead>
        <tr>
          <th>Weight</th>
          <th>Added On</th>
        </tr>
      </thead>
      <tbody>
        @foreach($weights as $weight)
          <tr>
            <td>{{ $weight->amount }} lbs</td>
            <td>{{ $weight->created_at }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="pagination">
      {{ $weights->links() }}
    </div>
  @else
    <p>Tracking your weight helps provide a better calories burned estimation for your workouts.</p>
  @endif
</div>
@stop