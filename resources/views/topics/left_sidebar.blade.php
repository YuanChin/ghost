<div id="sidebar-menu" class="sidebar-sticky-top">
    <ul class="nav flex-column">
        @foreach ($categories as $category)
        <li class="nav-item mt-2">
            <a class="nav-link" href="#">
                <div class="d-flex flex-row">
                    <div class="d-flex align-items-center mr-3">
                        {!! $category->icon !!}
                    </div>
                    <div class="d-flex">
                        {{ $category->name }}
                    </div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>