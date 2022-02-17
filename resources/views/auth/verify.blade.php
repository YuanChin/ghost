@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card bg-gray-700 rounded-xl">
                <div class="card-header border-gray-50 h3 text-gray-50">
                    {{ __('信箱驗證') }}
                </div>

                <div class="card-body text-gray-400">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('請先驗證您的 E-mail，如果您未收到請點擊以下：') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('點擊我重新發送！') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
