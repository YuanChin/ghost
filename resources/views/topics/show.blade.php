@extends('layouts.app')

@section('title', $topic->title)

@section('description', $topic->description)

@section('content')

<div class="row justify-content-center p-3 text-gray-50">
    <div class="col-md-12 text-left bg-gray-700 py-3 px-4 rounded-xl">
        <!-- title start -->
        <h1>{{ $topic->title }}</h1>
        <!-- title end -->

        <!-- article-meta start -->
        <small class="text-gray-400">
            <a href="{{ route('categories.show', $topic->category_id) }}"
               title="{{ $topic->category->name }}">
                <i class="far fa-folder"></i>
                {{ $topic->category->name }}
            </a>
            <span class="mx-2"> • </span>
            <a href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                <i class="far fa-user"></i>
                {{ $topic->user->name }}
            </a>
            <span class="mx-2"> • </span>
            <i class="far fa-clock"></i>
            <span title="最後活躍於：{{ $topic->updated_at }}">{{ $topic->updated_at->diffForHumans() }}</span>
            <span class="mx-2"> • </span>
            <a href="">
                <i class="fas fa-comment-alt"></i>
                <span> {{ $topic->reply_count }} </span>
            </a>
        </small>

        <div class="py-4">
            {!! $topic->body !!}
        </div>

        <div class="row justify-content-end mt-2 mx-0">
            @can('update', $topic)
            <div class="d-flex flex-row">
                <div class="d-flex align-items-center p-1 mr-1">
                    <a href="{{ route('topics.edit', $topic->id) }}" title="編輯">
                        <i class="far fa-edit"></i>
                    </a>
                </div>
                <div class="d-flex align-items-center p-1">
                    <a class="delete-topic text-gray-400" data-id="{{ $topic->id }}" title="刪除">
                        <i class="far fa-trash-alt"></i>
                    </a>      
                </div>
            </div>
            @endcan
        </div>
        
    </div>
</div>
{{-- reply_list --}}
<div class="row justify-content-start text-gray-50 rounded-xl mt-3">
    <div class="col-md-8">
        @include('topics.reply_list', ['replies' => $topic->replies()->with('user')->get()])
    </div>
</div>
{{-- reply_box --}}
<div>
    @includeWhen(Auth::check(), 'topics.reply_box', ['topic' => $topic])
</div>
@stop

@section('scripts')

<script>
    $(function () {
        let replyContent =  $('#reply-content');
        let cancel = $('#cancel');
        
        replyContent.click(function () {
            this.rows = "10";
            cancel.attr('hidden', false);
            cancel.parent('div').addClass('align-self-end')
        });
        
        cancel.click(function () {
            replyContent.attr('rows', '1');
            cancel.attr('hidden', true);
            cancel.parent('div').removeClass('align-self-end')
        });

        $('.delete-topic').on('click', function () {
            let id = $(this).data('id');
            Swal.fire({
                title: "確定要刪除該篇文章？",
                icon: "warning",
                showCancelButton: true,
            }).then(function (result) {
                if (result.isConfirmed) {
                    axios.delete('/topics/' + id)
                        .then(function () {
                            window.location.replace("{{ url('/') }}");
                        });
                }
            });
        });

        $('.delete-reply').on('click', function () {
            let id = $(this).data('id');
            Swal.fire({
                title: "確定要刪除該則留言？",
                icon: "warning",
                showCancelButton: true,
            }).then(function (result) {
                if (result.isConfirmed) {
                    axios.delete('/replies/' + id)
                        .then(function () {
                            window.location.reload();
                        });
                }
            });
        });
    });
</script>

@stop