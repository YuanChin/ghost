@if (count($topics))
    <ul class="list-unstyled">
        @foreach ($topics as $topic)
            <li class="bg-gray-700 rounded-xl mb-3 p-4">
                <div class="d-flex flex-column">
                    <a href="{{ $topic->link() }}">
                        <h5 class="mt-0 mb-2 text-gray-50 head-style">{{ $topic->title }}</h5>
                    </a> 
                    <small class="text-gray-400">
                        <a class="text-gray-400" href="{{ route('categories.show', $topic->category_id) }}"
                           title="{{ $topic->category->name }}">
                            <i class="far fa-folder"></i>
                            {{ $topic->category->name }}
                        </a>
                        <span class="mx-1"> • </span>
                        <i class="far fa-clock"></i>
                        <span title="最後活躍於：{{ $topic->updated_at }}">{{ $topic->updated_at->diffForHumans() }}</span>
                        <span class="mx-1"> • </span>
                        <a href="" class="text-gray-400">
                            <i class="fas fa-comment-dots"></i>
                            <span> {{ $topic->reply_count }} </span>
                        </a>
                    </small>
                </div>
            </li>
        @endforeach
    </ul>
@else
    <div class="d-flex justify-content-center text-gray-50">該用戶目前沒有任何發表的話題 ~_~ </div>
@endif

{{-- 分頁 --}}
<div class="mt-4 pt-1">
    {!! $topics->render() !!}
</div>