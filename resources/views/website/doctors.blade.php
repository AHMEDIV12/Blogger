@extends('layouts.main')

@push('extra-css')
<link rel="stylesheet" href="../css/doctors.css">
@endpush 

@section('content')

@if (auth()->user() != null)
    @if ((auth()->user()->category == 'admin'))
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6 text-start">
                        <a href="{{ route('doctors.create') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col-6">
                        <span class="card-title text-start">Add Doctors</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

    <!-- Main Title -->
    <div class="container">
        <div class="top1">
            <div class="one">
                <h3>طاقم الأطباء</h3>
            </div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>
    <!-- End Main Title -->


    <!-- Start Doctors Section -->
    <div class="doctors">
        <div class="container">
            <div class="row">
                @foreach($doctors as $doctor)
                <div class="col-sm-4 item-doc pb-5">
                    <a href="{{ route('web.doctors.show', $doctor->id) }}">
                        <img class="item-img rounded-circle"
                            src="../imgs/doctor-with-his-arms-crossed-white-background_1368-5790.jpg">
                        <h3>د/{{ $doctor->name }}</h3>
                        <p class="text-black-50">{{ $doctor->getDocSpecialty() }}</p>
                    </a>
                </div>
                @endforeach
            </div><!-- /.row -->
        </div>
    </div>
    <!-- End Doctors Section -->
@endsection