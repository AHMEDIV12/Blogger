@extends('layouts.main')

@section('tab_name')
<title> doctor profile</title>
@endsection

@push('extra-css')
<link rel="stylesheet" href="../css/doctors.css">
@endpush 


{{-- coming from WebsiteController  --}}


@section('content')
    <!-- Main Title -->
    <div class="container">
        <div class="top1">
            <div class="one">
                <h3>الأطباء</h3>
                {{--  --}}
            </div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>
    <!-- End Main Title -->
    @if ($doctor != null)
        <div class="container my-4">
            
            <div class="row">
                @if(session()->has('success'))
                    <div class="col-12 my-2">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                @if(session()->has('danger'))
                    <div class="col-12 my-2">
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card card-body">
                        <img src="../imgs/doctor-holding-up-bottle-with-tablets-pills-treatment.jpg" class="img-thumbnail" alt="...">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-body" style="display: block">
                        <h2>{{ $doctor->name }}</h2>
                        <p class="fw-bold">
                            {{ $doctor->description }}
                        </p>
                        
                        <h3>المواعيد المتاحة</h3>
                        <hr/>
                        <div class="row">
                            <div class="col-6">
                            @if(sizeof($doctor->doctor_schedule))
                                @foreach($doctor->doctor_schedule as $day)
                                <span class="badge bg-info text-dark">{{ $day->day }}</span>
                                @endforeach
                            @else 
                                <span>---</span>
                            @endif
                            </div>
                            <div class="col-6 text-start">
                                @auth()
                                <?php
                                // dd($meeting);
                                    $arrangedDate =auth()->user()->user_meetings()->where('doctor_id', $doctor->id)->where('date', '>', Date('Y-m-d'))->count(); 
                                ?>
                                    @if(auth()->user()->id != $doctor->id)

                                        @if($arrangedDate)
                                            <button class="btn btn-outline-dark" disabled="disabled" class="btn btn-primary">@if($meeting->reservation_status == 'true') تم تاكيد الحجز  @else جاري تاكيد الحجز  @endif</button>
                                        @else
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">تحديد مواعيد</button>
                                        @endif
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>
            
            @auth
                @if(auth()->user()->id != $doctor->id)
                    <div class="card card-body">
                        <form action="{{ route('web.doctors.comment.store', $doctor->id) }}" method="POST">
                            @csrf
                            <legend>اضافة تعليق</legend>
                            <textarea name="comment" required="required" class="form-control"></textarea>
                            <button class="btn btn-primary mt-3 float-start">اضافة تعليق</button>
                        </form>
                    </div>
                @endif
            @endauth
                   

            <div class="card card-body mt-4">
                @foreach($doctor->doctor_comments as $comment)
                <hr/>
                <?php
                // dd( $comment->doctor_id);
                ?>
                <div class="row">
                    <div class="col-md-3 text-center">
                        <h4>{{ $comment->user->name }}</h4>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $comment->comment }}</p>
                    </div>
                        @auth
                            @if(auth()->user()->category == 'admin' || auth()->user()->id === $comment->user_id)
                                <form action="{{ route('web.doctors.comment.destroy', $comment->id) }}" method="POST" class="col-md-1 text-start">
                                    @csrf
                                    @method('delete')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                </form>
                            @endif
                        @endauth
                </div><!-- /.row -->
                @endforeach
            </div>
        </div><!-- /.container -->
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <div class="modal-body">
                            <form action="{{ route('request_date', $doctor->id) }}" method="POST">
                                @csrf 
                                <legend>حجز موعد</legend>
                                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                <input type="text" hidden value="false" name="reservation_status">

                                <div class="form-group my-3">
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                    <button class="btn btn-primary">حجز الموعد</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    @endif

@endsection