@if (count($topics))
<ul class="list-unstyled">
    @foreach ($topics as $topic)
        <li class="border-gray-300 border-y-2 mb-3 p-4">
            <div class="d-flex flex-row">
                <a href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                    <img src="{{ $topic->user->avatar }}" class="img-4 mr-3 rounded-xl" alt="{{ $topic->user->name }}">
                </a>
                <div class="d-flex flex-column">
                    <a href="{{ route('topics.show', $topic->id) }}">
                        <h3 class="mt-0 mb-2 text-gray-50 head-style">{{ $topic->title }}</h3>
                        <p class="text-gray-400">{!! Str::limit($topic->body, 100, $end = '...') !!}</p>
                    </a>
                    <small class="text-gray-400">
                        <a href="{{ route('categories.show', $topic->category_id) }}"
                           title="{{ $topic->category->name }}">
                            <i class="far fa-folder"></i>
                            {{ $topic->category->name }}
                        </a>
                        <span class="mx-1"> • </span>
                        <a href="{{ route('users.show', [$topic->user_id]) }}"
                           title="{{ $topic->user->name }}">
                            <i class="far fa-user"></i>
                            {{ $topic->user->name }}
                        </a>
                        <span class="mx-1"> • </span>
                        <i class="far fa-clock"></i>
                        <span title="最後活躍於：{{ $topic->updated_at }}">{{ $topic->updated_at->diffForHumans() }}</span>
                        <span class="mx-1"> • </span>
                        <a href="">
                            <i class="fas fa-comment-alt"></i>
                            <span> {{ $topic->reply_count }} </span>
                        </a>
                    </small>
                </div>
            </div>
        </li>
        <hr class="border-2 border-gray-300">
    @endforeach
</ul>
@else
    <div class="d-flex justify-content-center text-gray-50">暫無數據 ~_~ </div>
@endif

<!-- paginator start -->
<div class="d-flex mt-4">
    {!! $topics->appends(Request::except('page'))->render() !!}
</div>
<!-- paginator end -->