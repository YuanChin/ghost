@if (isset($category))
    <div class="card bg-gray-700 mb-4">
        <div class="card-body">
            <h4 class="card-title text-gray-50 text-center">{{ $category->name }}</h4>
            <hr class="mt-2">
            <p class="card-text text-gray-400">{{ $category->description }}</p>
            <a href="{{ route('topics.create') }}" class="btn btn-success btn-block" aria-label="Left Align">
                <i class="fas fa-pencil-alt mr-2"></i>新建文章
            </a>
        </div>
    </div>
@else
    <div class="card bg-gray-700 mb-4">
        <div class="card-body">
            <h4 class="card-title text-gray-50 text-center">Ghost 社區</h4>
            <hr class="mt-2">
            <p class="card-text text-gray-400">這是一個讓你發表你想發的文章的社區</p>
            <a href="{{ route('topics.create') }}" class="btn btn-success btn-block" aria-label="Left Align">
                <i class="fas fa-pencil-alt mr-2"></i>新建文章
            </a>
        </div>
    </div>
@endif