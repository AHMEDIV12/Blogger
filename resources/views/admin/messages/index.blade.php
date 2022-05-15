@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <span class="card-title">Meetings Adminstration</span>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('meetings.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body" style="height: 400px; overflow-y: scroll;">
            <table class="table text-center">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->message }}</td>
                    <td>
                        <form style="display: inline" method="post" action="{{ route('messages.destroy', $message->id) }}">
                            @csrf 
                            @method('delete')
                            <button class="delete-btn btn btn-danger btn-sm">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div><!-- /.card --> 

    <div class="d-flex justify-content-end mt-3">
        {{ $messages->links() }}
    </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function () {
    $('.delete-btn').click(function (e) {
        e.preventDefault();

        let flag = confirm('Are you sure you want to delete message ?!');

        if (flag) {
            $(this).parent().submit()
        }
    });
});
</script>
@endpush