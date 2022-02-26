<div id="sidebar-menu" class="sidebar-sticky-top">
    <ul class="nav flex-column">
        <li class="nav-item mt-2 {{ active_class(if_route('topics.index')) }}">
            <a class="nav-link" href="{{ route('topics.index') }}">
                <div class="d-flex flex-row">
                    <div class="d-flex align-items-center mr-3">
                        <span><i class="fa-solid fa-house"></i></span>
                    </div>
                    <div class="d-flex">
                        <span>話題</span>
                    </div>
                </div>
            </a>
        </li>
        @foreach ($categories as $category)
        <li class="nav-item my-1 {{ category_sidebar_active($category->id) }}">
            <a class="nav-link" href="{{ route('categories.show', $category->id) }}">
                <div class="d-flex flex-row">
                    <div class="d-flex align-items-center mr-3">
                        <span>{!! $category->icon !!}</span>
                    </div>
                    <div class="d-flex">
                        <span>{{ $category->name }}</span>
                    </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>