<div class="container">
  @if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif
  @if(Session::has('alert'))
    <div class="alert alert-danger">{{ Session::get('alert') }}</div>
  @endif
</div>