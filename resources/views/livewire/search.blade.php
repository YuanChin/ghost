<div>
    {{-- 搜尋按鈕 --}}
    <button
        wire:click="open"
        wire:keydown.escape="close"
        type="button"
        class="btn text-gray-400"
    >
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>

    {{-- 搜尋 Modal --}}
    @if ($show)
        <div class="position-fixed inset-0">
            <div class="d-flex justify-content-center"
                wire:keydown.escape="close"
            >

                <div class="position-fixed inset-0 bg-gray-400 opacity-40 z-10"
                    wire:click="close"
                >
                </div>

                <div class="d-flex flex-column mt-20 z-20">
                    {{-- 搜尋欄 --}}
                    <div class="position-relative d-flex align-items-center search-box bg-gray-700 rounded-xl px-2 py-3">
                        <div class="text-gray-50 px-2">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                        <input
                            type="text"
                            wire:model.debounce.500ms="search"
                            autocomplete="off"
                            placeholder="搜尋文章"
                            class="bg-gray-700"
                        />

                        
                    </div>

                    {{-- 搜尋結果列表 --}}
                    @if (strlen($search) >= 2)
                        <div class="d-flex flex-column bg-gray-700 mt-3 rounded-xl py-3 px-2">
                            @if ($results->count() > 0)
                            <div class="d-flex justify-content-center">
                                <span>搜尋結果</span>
                            </div>
                            <ul class="nav flex-column">
                                @foreach ($results as $result)
                                <li>
                                    <a href="{{ $result->link() }}" class="nav-link">
                                        {{ $result->title }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <div class="d-flex justify-content-center">
                                抱歉...找不到相關文章
                            </div>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
        </div>
    @endif
</div>