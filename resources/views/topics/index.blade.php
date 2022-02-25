@extends('layouts.app')
@section('title', '話題列表')

@section('content')
    <div class="row">
        {{-- left sidebar --}}
        <div class="col-lg-2 col-md-3 px-0 mb-3">
            @include('topics.left_sidebar')
        </div>

        {{-- main content --}}
        <div class="col-lg-7 col-md-6 mb-3">

        </div>

        {{-- right sidebar --}}
        <div class="col-lg-3 col-md-3">
            
        </div>
    </div>
@stop