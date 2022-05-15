@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('users.store') }}" method="POST" class="card card-body">
                    @csrf
                    <legend>Create New User</legend>
                    
                    <hr/>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required>
                        @error('name')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
                        @error('email')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control" required>
                        @error('phone')
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

                    <button class="btn btn-block btn-primary">
                        Create User
                    </button>
                </form><!-- /.card -->
            </div>
        </div>
    </div>
@endsection