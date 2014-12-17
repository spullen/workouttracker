@if($hours > 0)
  @choice('messages.hours', $hours)
@endif

@choice('messages.minutes', $minutes)