<ul class="list-unstyled">
    @foreach ($replies as $index => $reply)
    <li class="bg-gray-700 text-gray-400 rounded-xl mb-3 px-3 pt-3">
        <div class="d-flex flex-row">
            <div class="media-body">
                <div>
                    {!! $reply->content !!}
                </div>
                <div class="d-flex align-items-center text-secondary pb-2">
                    <small>
                        <i class="far fa-clock mr-1"></i> 回覆於 {{ $reply->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>

{{-- 分頁 --}}
<div class="mt-4 pt-1">
    {!! $replies->appends(Request::except('page'))->render() !!}
</div>