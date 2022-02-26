@extends('layouts.app')
@section('title', isset($category_name) ? $category_name : '話題列表')

@section('content')
    <div class="row">
        {{-- left sidebar --}}
        <div class="col-lg-2 col-md-3 px-0 mb-3">
            @include('topics.left_sidebar')
        </div>

        {{-- main content --}}
        <div class="col-lg-7 col-md-6 mb-3">
            <div class="card text-gray-300 bg-gray-700">
                <!-- 文章頭部選取區 start -->
                <div class="card-header border-b-2 border-gray-400 bg-gray-700 card-sticky-top">
                    <div class="d-flex flex-row">
                        <div class="show-selector">
                            <ul class="nav">
                                <li class="nav-item {{ active_class(if_route('topics.index')) }}">
                                    <a class="nav-link rounded-xl"
                                       href="{{ route('topics.index') }}">
                                        <span>全部</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-xl"
                                       href="">
                                        <span>收藏</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- @unless (isset($favored)) -->
                        <div class="ml-auto d-flex flex-row">
                            <div class="d-flex align-items-center">
                                文章排序依：
                            </div>
                            <form class="order-form d-flex align-items-center"
                                  action="{{ Request::url() }}">
                                <select name="order" class="custom-select bg-gray-500 border-gray-500 text-gray-200 rounded-2xl">
                                    <option value="">選擇</option>
                                    <option value="default">最熱</option>
                                    <option value="recent">最新</option>
                                </select>
                            </form>
                        </div>
                        <!-- @endunless -->
                    </div>
                </div>
                <!-- 文章頭部選取區 end -->

                <!-- 文章列表區 start -->
                <div id="list" class="card-body">
                    @include('topics.topic_list')
                </div>
                <!-- 文章列表區 end -->
            </div>
        </div>

        {{-- right sidebar --}}
        <div class="col-lg-3 col-md-3">

        </div>
    </div>
@stop