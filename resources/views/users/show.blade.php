@extends('layouts.app')

@section('title', '個人中心')

@section('content')

<div class="row">
    <div class="col-md-5">
        <!-- selector start -->
        <ul id="user-options-selector" class="nav py-3 bg-gray-700 rounded-xl">
            <li class="w-100">
                <div class="d-flex flex-row">
                    <a class="nav-link py-0 w-100" href="#">請選擇所要查看的用戶內容</a>
                    <div class="nav-link py-0 angle text-blue-400 initial-rotate">
                        <i class="fa-solid fa-angles-right"></i>
                    </div>
                </div>
                <ul class="pl-0 mt-3">
                    <li class="active"><a class="nav-link" href="">發布話題</a></li>
                    <li class=""><a class="nav-link" href="">留言紀錄</a></li>
                </ul>
            </li>        
        </ul>
        <!-- selector end -->
        <!-- Person start -->
        <div class="py-4 my-2 p-3 bg-gray-900 text-gray-400">
            <div classd="d-flex flex-column">
                <div>
                    <div class="d-flex justify-content-center">
                        <img src="https://cdn.learnku.com/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="w-50 h-50 rounded-circle" alt="{{ $user->name }}">
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="my-2 text-gray-50">{{ $user->name }}</p>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="d-flex justify-content-center">
                        <h5 class="my-2 text-gray-50"><strong>個人簡介</strong></h5>
                    </div>
                    <div class="d-flex">
                        <p></p>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="d-flex justify-content-center">
                        <h5 class="my-2 text-gray-50"><strong>註冊於</strong></h5>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p>{{ $user->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="d-flex justify-content-center">
                        <h5 class="my-2 text-gray-50"><strong>最後活躍</strong></h5>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p title=""></p>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Person end -->
    </div>

    <div id="list" class="col-md-7">
        
    </div>
</div>

@stop

@section('scripts')
<script>
    $(function () {
        $("#user-options-selector > li").on("click", function () {
            let angle = $("#user-options-selector > li .angle");
            
            if(angle.hasClass("initial-rotate")){
                angle.removeClass("initial-rotate").addClass("rotate");
            } else {
                angle.removeClass("rotate").addClass("initial-rotate");
            }

            $(this).children("ul").stop().slideToggle(400);
        });
    });
</script>
@stop