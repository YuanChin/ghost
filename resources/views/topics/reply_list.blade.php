<ul class="list-unstyled">
    @foreach ($replies as $index => $reply)
    @if ($loop->first)
    <li class="d-flex flex-column bg-gray-700 rounded-xl my-3 px-3 pt-3">
        <div class="d-flex flex-row">
            <div class="d-flex flex-row">
                <img src="{{ $reply->user->avatar }}" class="mr-3 rounded-xl img-2" alt="{{ $reply->user->name}}">
                <div class="d-flex flex-column text-gray-400">
                    <h5 class="mt-0 mb-2 text-gray-50">{{ $reply->user->name }}</h5>
                    {!! $reply->content !!}
                </div>
            </div>
            <div class="d-flex ml-auto">
                @can('destroy', $reply)
                <div class="d-flex">
                    <a class="delete-reply text-gray-400" data-id="{{ $reply->id }}" title="刪除">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </div>
                @endcan
            </div>
        </div>
        
        <div class="d-flex flex-row py-3 text-gray-400 ml-auto text-sm">
            <div class="d-flex align-items-center mr-1">
                <i class="far fa-clock"></i>
            </div>
            <div>
                <span>回覆於 {{ $reply->created_at->diffForHumans() }}</span>
            </div>
        </div>
        
    </li>
    @else
    <li class="d-flex flex-column bg-gray-700 rounded-xl mb-3 px-3 pt-3">
        <div class="d-flex flex-row">
            <div class="d-flex flex-row">
                <img src="{{ $reply->user->avatar }}" class="mr-3 rounded-xl img-2" alt="{{ $reply->user->name}}">
                <div class="d-flex flex-column text-gray-400">
                    <h5 class="mt-0 mb-2 text-gray-50">{{ $reply->user->name }}</h5>
                    {!! $reply->content !!}
                </div>
            </div>
            <div class="d-flex ml-auto">
                @can('destroy', $reply)
                <div class="d-flex">
                    <a class="delete-reply text-gray-400" data-id="{{ $reply->id }}" title="刪除">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </div>
                @endcan
            </div>
        </div>
        
        <div class="d-flex flex-row py-3 text-gray-400 ml-auto text-sm">
            <div class="d-flex align-items-center mr-1">
                <i class="far fa-clock"></i>
            </div>
            <div>
                <span>回覆於 {{ $reply->created_at->diffForHumans() }}</span>
            </div>
        </div>
        
    </li>
    @endif
    @endforeach
</ul>