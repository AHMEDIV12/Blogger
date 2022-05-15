@extends('layouts.app')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
@endpush 

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('meetings.update', $target_meeting->id) }}" method="POST" class="card card-body">
                    @csrf
                    @method('PUT')
                    <legend>Edit Meeting</legend>
                    
                    <hr/>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="date">Date</label>
                        <input type="datetime-local" name="date" id="date" value="{{ join('T', explode(' ', $target_meeting->date)) }}" class="form-control" required>
                        @error('date')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="date">Reservation Status</label>
                        <input type="text" name="date" disabled value="{{ $target_meeting->reservation_status }}" class="form-control" required>
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
                            <option @if($target_meeting->user_id == $user->id) selected="selected" @endif value="{{ $user->id }}">{{ $user->name . ' :: ' . $user->email }}</option>
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
                            <option @if( $target_meeting->doctor_id == $doctor->id) selected="selected" @endif value="{{ $doctor->id }}">{{ $doctor->name . ' :: ' . $doctor->email }}</option>
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
                        <textarea class="form-control" name="note" id="note" rows="5">{{ $target_meeting->note }}</textarea>
                        @error('note')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <button class="btn btn-block btn-warning">
                        Update Meeting
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