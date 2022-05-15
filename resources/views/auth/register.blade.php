@extends('layouts.main')

@push('extra-css')
<link rel="stylesheet" href="{{ asset('css/contactUs.css') }}">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')

 <!-- Main Title -->
<div class="container">
    <div class="top1">
        <div class="one">
            <h3>تسجيل الدخول</h3>
        </div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
</div>
<!-- End Main Title -->

<!-- Start Form section -->
<div class="auth">
    <div class="container-fluid">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-6 col-md-10 mx-auto">
                    <div class="auth-box shadow">
                        <form method="POST" action="{{ route('register') }}" class="auth-form">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                                placeholder="الاسم بالكامل" aria-label="userName"
                                                aria-describedby="basic-addon1" required>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="far fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="phone" id="phone" class="form-control  @error('phone') is-invalid @enderror"
                                                placeholder="رقم الهاتف" aria-label="phone"
                                                aria-describedby="basic-addon3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">
                                                    <i class="fas fa-mobile-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required 
                                                placeholder="البريد الالكتروني" aria-label="userEmail"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <i class="far fa-envelope"></i>
                                                </span>
                                            </div>
                                        </div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="كلمة المرور"
                                                aria-label="userPassword" aria-describedby="basic-addon4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text cursor-pointer" id="basic-addon4">
                                                    <i class="far fa-eye" id="showPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password_confirmation" required
                                                placeholder="تاكيد كلمة المرور" aria-label="userConfirmPassword"
                                                aria-describedby="basic-addon5">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text cursor-pointer" id="basic-addon5">
                                                    <i class="far fa-eye" id="showConfPassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input  class="form-control" name="category" type="text" placeholder="نوع المستخدم" >                                                
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">
                                                    <i class="far fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn mt-3 py-2 btn-block login-btn shadow-sm text-white" style="width: 100%;">
                                تسجيل
                            </button>
                            <br>
                            <br>
                            <button class="btn btn-block login-btn shadow-sm text-white" style="width: 100%;"
                                id="login-btn">
                                {{--  --}}
                                <a href="{{ route('login') }}" class="text-decoration-none">تمتلك حساب ؟ دخول</a>

                                {{-- <a href="../pages/login.html" class="text-decoration-none">تمتلك حساب ؟ دخول</a> --}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Form section -->

{{--
<!-- End Form section -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}

@endsection
