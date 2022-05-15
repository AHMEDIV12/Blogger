@extends('layouts.main')

@push('extra-css')
<link rel="stylesheet" href="{{ asset('css/contactUs.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<!-- Main Title -->
<div class="container">
    <div class="top1">
        <div class="one">
            <h3>الدخول</h3>
        </div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
</div>
<!-- End Main Title -->

<!-- Start Form section -->
<div class="auth mb-5">
    <div class="container-fluid bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10 mx-auto" id="height-edit">
                    <form method="POST" action="{{ route('login') }}" class="auth-box">
                        @csrf
                        <div class="auth-form">
                            <div class="form-group my-2">
                                <div class="input-group">
                                    <input type="email" name="email" id="userPhone" class="form-control"
                                        placeholder="البريد الالكتروني" aria-label="userPhone"
                                        aria-describedby="basic-addon1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group my-2">
                                <div class="input-group">
                                    <input type="password" name="password" id="userPassword"
                                        class="form-control" placeholder="كلمة المرور" aria-label="userPassword"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text cursor-pointer" id="basic-addon2">
                                            <i class="far fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-check my-4">
                                <input type="checkbox" class="form-check-input" id="remeberMe">
                                <label class="form-check-label" for="remeberMe">تذكرني</label>
                            </div>

                            <button class="my-2 btn btn-block login-btn shadow-sm text-white py-2" style="width: 100%;"
                                id="login-btn">
                                دخول
                            </button>

                            <a href="{{ route('register') }}" class="btn btn-block login-btn shadow-sm text-white py-2" style="width: 100%;"
                                id="login-btn">
                                لا امتلك حساب؟ تسجيل جديد
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form section -->

@endsection
