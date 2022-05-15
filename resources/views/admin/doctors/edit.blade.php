@extends('layouts.app')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    
@endpush 

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('doctors.update', $target_user->id) }}" method="POST" class="card card-body">
                    @csrf
                    @method('PUT')
                    
                    <legend>Update <b>"{{ $target_user->name }}"</b> Dcotor Acount </legend>
                    
                    <hr/>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $target_user->name }}" class="form-control" required>
                        @error('name')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ $target_user->email }}" class="form-control" required>
                        @error('email')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ $target_user->phone }}" class="form-control" required>
                        @error('phone')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="phone">Specialty</label>
                        <select id="specialty" name="specialty" class="form-control">
                            @foreach($specialties as $specialty)
                            <option @if($target_user->getDocSpecialty() == $specialty->name) selected="selected" @endif >{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                        @error('specialty')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="phone">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5">{{ $target_user->description }}</textarea>
                        @error('description')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @error('password')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="password">Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                        @error('password')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div>

                    <button class="btn btn-block btn-warning">
                        Update Doctor
                    </button>
                </form><!-- /.card -->
            </div>
        </div>
    </div>
@endsection


@push('js')
<script>
$(document).ready(function () {

    $("#specialty").select2({
        tags: true
    });

});
</script>
@endpush