@if($hours > 0)
  @choice('messages.duration_hours', $hours)
@endif

@choice('messages.duration_minutes', $minutes)