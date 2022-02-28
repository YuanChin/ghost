<div>
    @if ($notifications->count())
        <ul class="list-unstyled">
            @foreach ($notifications as $notification)
                @include('notifications.types.' . Str::snake(class_basename($notification->type)))
            @endforeach
        </ul>
    @else
        <div class="d-flex justify-content-center text-gray-50">没有消息通知！</div>
    @endif
</div>
