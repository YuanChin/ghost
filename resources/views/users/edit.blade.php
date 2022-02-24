@extends('layouts.app')

@section('title', '編輯個人資料')

@section('content')

<div class="row justify-content-center text-gray-50 mx-3">
    <div class="col-md-7 text-center h3 mb-3">
        <i class="fas fa-user-edit"></i>
        <span class="ml-1">編輯個人資料</span>
    </div>
    <div class="w-100"></div>
    <div class="bg-gray-700 col-md-7 rounded-2xl shadow">
        <div class="px-4 py-5">
            <form action="{{ route('users.update', $user->id) }}" method="POST"
                  accept-charset="UTF-8" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @include('shared.error')
                
                <div class="form-group">
                    <label for="name-field" class="h5 mb-2">用戶名</label>
                    <input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $user->name) }}" />
                </div>
                <div class="form-group">
                    <label for="email-field" class="h5 mb-2">電子信箱</label>
                    <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $user->email) }}" />
                </div>
                <div class="form-group">
                    <label for="introduction-field" class="h5 mb-2">個人簡介</label>
                    <textarea name="introduction" id="introduction-field" class="form-control" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="" class="avatar-label">用戶頭像</label>
                    <input type="file" name="avatar" class="form-control-file">
                    @if($user->avatar)
                        <br>
                        <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
                    @endif
                    
                </div>
                <button type="submit" class="btn btn-primary btn-block rounded-pill">保存</button>
            </form>
        </div>
    </div>
</div>

@stop