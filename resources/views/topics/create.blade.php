@extends('layouts.app')

@section('title', '新增話題')

@section('content')

<div class="row justify-content-center text-gray-50">
    <div class="col-md-7 text-center py-3 h3 mb-3">
        <div class="d-flex flex-row justify-content-center">
            <div class="d-flex align-items-center mr-2">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
            <div>
                <span>新增話題</span>
            </div>
        </div>  
    </div>

    <div class="w-100"></div>

    <div class="col-md-7">
        <div class="px-4 py-5 bg-gray-700 rounded-xl shadow">
            <form action="{{ route('topics.store') }}" method="POST"
                accept-charset="UTF-8">
                @csrf
                @include('shared.error')
                
                <div class="form-group">
                    <label for="title-field" class="h5 mb-2">標題</label>
                    <input class="form-control" type="text" name="title"
                           value="{{ old('title', $topic->title) }}" id="title-field"
                           placeholder="請填寫標題…" required />
                </div>
                <div class="form-group">
                    <label for="category-field" class="h5 mb-2">分類</label>
                    <select class="form-control" name="category_id" required id="category-field">
                        <option value="" hidden disabled selected>請選擇分類</option>
                        @foreach ($categories as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="editor" class="h5 mb-2">內容</label>
                    <textarea name="body" class="form-control" id="editor" rows="6" placeholder="請填入至少三個字符內容。" required>{{ old('body', $topic->body ) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block rounded-pill mt-4">保存</button>
            </form>
        </div>
    </div>
</div>

@stop