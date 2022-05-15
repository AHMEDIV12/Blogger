@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('drugs_update' , $drug->id) }}" method="POST" class="card card-body" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <legend>Update Drug </legend>
                    
                    <hr/>

                    <div class="mb-3">
                        <label class="form-label fw-bold" for="name">Title</label>
                        <input type="text" name="title" id="name" value="{{ $drug->title }}" class="form-control" required>
                        @error('title')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="email">Description</label>
                        <textarea type="desc" name="desc" id="email" class="form-control" required> {{ $drug->desc }} </textarea>
                        @error('desc')
                        <div style="padding: 5px 8px" class="alert my-2 alert-danger">
                            {{$message}}
                        </div><!-- /.alert -->
                        @enderror
                    </div><!-- /.mb-3 -->

                    
                    <div class="form-group mb-3 mt-3">
                        <label for="img">Drug Image should be 250px*250px </label>
                        <input type="file" name="img" value="{{$drug->img}}" required>
                    </div>

                    <div>
                        <button class="btn btn-block btn-warning">
                            Update Drug
                        </button>
                    </div>
                </form><!-- /.card -->
            </div>
        </div>
    </div>
@endsection