@extends('layouts.main')

@push('extra-css')
<link rel="stylesheet" href="../css/contactUs.css">
@endpush 

@section('content')
<!-- Main Title -->
<div class="container">
    <div class="top1">
        <div class="one">
            <h3>تواصل معنا</h3>
        </div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
</div>
<!-- End Main Title -->

<!-- Start Form section -->
<div class="form-section mb-5">
    <div class="container-fluid">
        <div class="container">
            
            @if(session()->has('success'))
            
            <div class="row">
                <div class="col-lg-6 col-md-10 mx-auto">
                    <div style="border-radius: 20px" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif 

            <div class="row">
                <div class="col-lg-6 col-md-10 mx-auto">
                    <div class="auth-box shadow" id="height-edit2">
                        <form action="{{ route('messages') }}" method="POST" class="auth-form">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-12 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="name" id="userName" class="form-control"
                                                placeholder="اسم المستخدم" aria-label="userName"
                                                aria-describedby="basic-addon1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="far fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('name')
                                        <div style="padding: 8px 3px; border-radius: 20px" class="my-2 alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                @if (auth()->user() !=null)
                                    <input type="text" name="email" id="email" class="form-control"
                                        aria-label="userEmail"
                                        aria-describedby="basic-addon2" value="{{auth()->user()->email}}" hidden  >
                                @else
                                    <div class="col-lg-12 my-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="email" id="email" class="form-control"
                                                    placeholder="البريد الالكتروني" aria-label="userEmail"
                                                    aria-describedby="basic-addon2" >
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="far fa-envelope"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            @error('name')
                                            <div style="padding: 8px 3px; border-radius: 20px" class="my-2 alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-12 my-2">
                                    <div class="form-group mb-0">
                                        <textarea class="form-control" placeholder="الملاحظات" name="message"
                                            id="userMSG" rows="7"></textarea>
                                            
                                        @error('name')
                                        <div style="padding: 8px 3px; border-radius: 20px" class="my-2 alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <button id="sendBTN"
                                    class="btn mr-3 d-flex justify-content-center align-items-center"
                                    data-toggle="modal" data-target="">
                                    ارسال <i class="far fa-paper-plane mr-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form section -->
@endsection