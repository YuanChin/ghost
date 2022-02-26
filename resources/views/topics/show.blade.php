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
        </div>
        
    </div>
</div>
@stop