@extends('layouts.main')

@section('tab_name')
<title> profile</title>
@endsection
@push('extra-css')
<style>
    .list-group-item {
        cursor: pointer;
    }
</style>
@endpush 

{{-- coming from UserController  --}}

@section('content')
<!-- Main Title -->
<div class="container">
    <div class="top1">
        <div class="one">
            <h3>الملف الشخصي</h3>
        </div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
</div>
<!-- End Main Title -->

<div class="container my-4">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <ul class="list-group" style="padding: 0;">
                <li class="list-group-item @if($errors->any()) @else active @endif" data-target="#dateList">قائمة الحجوزات</li>
                <li class="list-group-item" data-target="#profileInfo">الملف الشخصي</li>
                <li class="list-group-item @if($errors->any()) active @endif" data-target="#updateProfileInfo">تحديث الملف الشخصي</li>
            </ul>
        </div>
        <div class="col-md-9">
            <div @if($errors->any()) style="display: none" @endif class="card toggle-card text-center" id="dateList">
                <div class="card-header">
                    قائمة الحجوزات
                </div>
                <div class="card-body" style="height: 400px; overflow-y: scroll">

                    <table class="table">
                        <tr>
                            <td>الطبيب</td>
                            <td>المريض</td>
                            <td>التخصص</td>
                            <td>المعاد</td>
                            <td>الاعدادات</td>
                        </tr>
                        
                        @if($target_user->category == 'doctor')
                            @foreach($target_user->doctor_meetings as $meeting)
                            <tr>
                                <td>{{ $meeting->getUser() }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $meeting->doctor->getDocSpecialty() }}</td>
                                <td>{{ explode(' ', $meeting->date)[0] }}</td>
                                <td>
                                @if(isset($meeting->join_url))
                                <a href="{{$meeting->start_url}}" class="btn btn-success btn-sm" target="_blank">
                                    <i class="fa fa-link" aria-hidden="true"></i>
                                </a>
                                @else 
                                    @if($meeting->reservation_status == 'false')
                                        <div class="d-flex justify-content-evenly align-items-center">
                                            <div class="">
                                                لم يتم تاكيد الموعد
                                            </div>
                                            <form action="{{route('update_request_date' , $meeting->id) }}" method="post">
                                                    @csrf
                                                    <input type="text" name="reservation_status" hidden value='true' >
                                                    <input type="text" name="doctor_id" hidden value='{{$meeting->doctor_id}}' >
                                                    <input type="text" name="user_id" hidden value='{{$meeting->user_id}}' >
                                                    <input type="text" name="date" hidden value='{{$meeting->date}}' >
                                                    <button class="btn btn-small btn-primary">
                                                    تاكيد الموعد
                                                </button>
                                            </form>
                                        </div>
                                    @elseif($meeting->reservation_status == 'true')
                                    <div class="btn btn-small btn-primary">
                                        تم تاكيد الموعد
                                        </div>
                                    @endif
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            @foreach($target_user->user_meetings as $meeting)
                            <tr>
                                <td>{{ $meeting->getDoctor() }}</td>
                                <td>{{ $meeting->doctor->getDocSpecialty() }}</td>
                                <td>{{ explode(' ', $meeting->date)[0] }}</td>
                                <td>
                                @if(isset($meeting->join_url))
                                <a href="{{ $meeting->join_url }}" class="btn btn-success btn-sm" target="_blank">
                                    <i class="fa fa-link" aria-hidden="true"></i>
                                </a>
                                @else
                                    @if($meeting->reservation_status == 'true')
                                        <div class="btn btn-small btn-primary">
                                            تم تاكيد الموعد
                                        </div>
                                    @elseif($meeting->reservation_status == 'false')
                                        <div class="btn btn-small btn-warning">
                                            لم يتم تاكيد الموعد
                                        </div>
                                    @endif
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>

            <div style="display: none" class="card toggle-card" id="profileInfo">
                <div class="card-header">
                    الملف الشخصي
                </div>
                <div class="card-body row">
                    <div class="col-4">
                        <div class="text-center my-2">
                            <img class="img-thumbnail item-img rounded-circle" style="border-radius: 50%;width: 150px;" src="../imgs/doctor-with-his-arms-crossed-white-background_1368-5790.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-8">
                        <table class="table">
                            <tr>
                                <td>الاسم</td>
                                <td>{{ $target_user->name }}</td>
                            </tr>
                            @if($target_user->category == 'doctor')
                                <tr>
                                    <td>التخصص</td>
                                    <td>{{ $target_user->getDocSpecialty() }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>البريد الالكتروني</td>
                                <td>{{ $target_user->email }}</td>
                            </tr>
                            <tr>
                                <td>رقم الهاتف</td>
                                <td>{{ $target_user->phone }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div @if(!$errors->any()) style="display: none" @endif class="card toggle-card" id="updateProfileInfo">
                <div class="card-header">
                    تحديث الملف الشخصي
                </div>
                <div class="card-body row">
                    <form action="{{ route('profile.update', $target_user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-2">
                            <label class="mb-1" for="name">الاسم</label>
                            <input name="name" type="text" class="form-control" value="{{ $target_user->name }}">
                            @error('name')
                            <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                                {{$message}}
                            </div><!-- /.alert -->
                            @enderror
                        </div>
                        
                        <div class="mb-2">
                            <label class="mb-1" for="name">البريد الالكتروني</label>
                            <input name="email" type="email" class="form-control" value="{{ $target_user->email }}">
                            @error('email')
                            <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                                {{$message}}
                            </div><!-- /.alert -->
                            @enderror
                        </div>

                        
                        <div class="mb-2">
                            <label class="mb-1" for="name">رقم الهاتف</label>
                            <input name="phone" type="text" class="form-control" value="{{ $target_user->phone }}">
                            @error('phone')
                            <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                                {{$message}}
                            </div><!-- /.alert -->
                            @enderror
                        </div>

                        
                        <div class="mb-2">
                            <label class="mb-1" for="name">كلمة السر</label>
                            <input name="password" type="password" class="form-control" required>
                            @error('password')
                            <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                                {{$message}}
                            </div><!-- /.alert -->
                            @enderror
                        </div>

                        
                        <div class="mb-2">
                            <label class="mb-1" for="name">تاكيد كلمة</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                            @error('password')
                            <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                                {{$message}}
                            </div><!-- /.alert -->
                            @enderror
                        </div>

                        <button class="btn btn-primary float-start">
                            تحديث بيانات المستخدم
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.list-group-item').click(function () {
                let target = $(this).data('target');

                $('.list-group-item').removeClass('active')
                $(this).addClass('active');

                $('.toggle-card').slideUp(500);
                $(target).slideDown(500);
                
            });
        });
    </script>
@endpush