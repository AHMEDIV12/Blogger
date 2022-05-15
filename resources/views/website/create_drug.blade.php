@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('drugs_store') }}" method="POST" class="card card-body"  enctype="multipart/form-data" >
                    @csrf
                    <legend>Create New Drug</legend>
                    
                    <hr/>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="name">title</label>
                        <input type="text" name="title" id="name" value="{{old('title')}}" class="form-control" required>
                        @error('title')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="desc">Description</label>
                        <input type="text" name="desc" id="desc" value="{{ old('desc') }}" class="form-control" required>
                        @error('desc')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    <div class="form-group mb-3 mt-3">
                        <label for="img">Drug Image should be 250px*250px </label>
                        <input type="file" name="img">
                    </div>

                    <div>
                        <button class="btn btn-block btn-primary">
                            Create Drug
                        </button>
                    </div>
                </form><!-- /.card -->
            </div>
        </div>
    </div>
@endsection