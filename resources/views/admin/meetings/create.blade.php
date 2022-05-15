@extends('layouts.app')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
@endpush 

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('meetings.store') }}" method="POST" class="card card-body">
                    @csrf
                    <legend>Create New Meeting</legend>
                    
                    <hr/>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="date">Date</label>
                        <input type="datetime-local" name="date" id="date" value="{{old('date')}}" class="form-control" required>
                        @error('date')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="phone">User</label>
                        <select id="user" name="user_id" class="form-control">
                            <option value="">-- select user --</option>
                            @foreach($users as $user)
                            <option @if(old('user_id') == $user->id) selected="selected" @endif value="{{ $user->id }}">{{ $user->name . ' :: ' . $user->email }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="doctor">Doctor</label>
                        <select id="doctor" name="doctor_id" class="form-control">
                            <option value="">-- select doctor --</option>
                            @foreach($doctors as $doctor)
                            <option @if(old('doctor_id') == $doctor->id) selected="selected" @endif value="{{ $doctor->id }}">{{ $doctor->name . ' :: ' . $doctor->email }}</option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="note">Note</label>
                        <textarea class="form-control" name="note" id="note" rows="5">{{ old('note') }}</textarea>
                        @error('note')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <button class="btn btn-block btn-primary">
                        Create Meeting
                    </button>
                </form><!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
$(document).ready(function () {

    $("#user").select2();
    $("#doctor").select2();

});
</script>
@endpush