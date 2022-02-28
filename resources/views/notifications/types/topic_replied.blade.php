<li class="d-flex flex-column bg-gray-700 text-gray-50 rounded-xl mb-3 px-3 pt-3">
    <div class="d-flex flex-row">
        <a href="{{ route('users.show', $notification->data['user_id']) }}">
            <img class="mr-3 rounded-xl img-3" alt="{{ $notification->data['user_name'] }}" src="{{ $notification->data['user_avatar'] }}">
        </a>
        <div class="d-flex flex-column">
            <div class="text-gray-400">
                <a href="{{ route('users.show', $notification->data['user_id']) }}">{{ $notification->data['user_name'] }}</a>
                <span>，回覆了您的文章：</span>
                <a href="{{ $notification->data['topic_link'] }}">{{ Str::limit($notification->data['topic_title'], 25, $end = '...') }}</a>
            </div>
            <div class="d-flex flex-row">
                <span class="text-gray-200">說：</span>{!! Str::limit($notification->data['content'], 25, $end = '...') !!}
            </div>
            
        </div>
    </div>
    <div class="d-flex flex-row pb-3 text-gray-400 ml-auto text-sm">
        <div class="d-flex align-items-center mr-1">
            <i class="far fa-clock"></i>
        </div>
        <div>
            <span>回覆於 {{ $notification->created_at->diffForHumans() }}</span>
        </div>
    </div>
</li>