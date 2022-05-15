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
                    <th>Note</th>
                    <th>Date</th>
                    <th>Doctor</th>
                    <th>User</th>
                    <th>Reservations Status</th>
                    <th>Action</th>
                </tr>
                @foreach($meetings as $meeting)
                <tr>
                    <td>{{ $meeting->id }}</td>
                    <td>{{ $meeting->note }}</td>
                    <td>{{ isset($meeting->date) ? $meeting->date : '---' }}</td>
                    <td>{{ $meeting->getDoctor() }}</td>
                    <td>{{ $meeting->getUser() }}</td>
                    <td>{{ $meeting->reservation_status }}</td>
                    <td>

                        <a href="{{$meeting->start_url}}" class="btn btn-success btn-sm" target="_blank">
                            <i class="fa fa-link" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('meetings.edit', $meeting->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <form style="display: inline" method="post" action="{{ route('meetings.destroy', $meeting->id) }}">
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
        {{ $meetings->links() }}
    </div>
</div>
@endsection

@push('js')
<script>
$(document).ready(function () {
    $('.delete-btn').click(function (e) {
        e.preventDefault();

        let flag = confirm('Are you sure you want to delete account ?!');

        if (flag) {
            $(this).parent().submit()
        }
    });
});
</script>
@endpush