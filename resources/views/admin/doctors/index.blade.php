@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <span class="card-title"> Doctors Adminstration</span>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('doctors.create') }}" class="btn btn-sm btn-primary">
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Specialty</th>
                    <th>Days</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->getDocSpecialty() }}</td>
                    <td>
                        @if(sizeof($user->doctor_schedule))
                        @foreach($user->doctor_schedule as $day)
                        <span class="badge bg-info text-dark">{{ $day->day }}</span>
                        @endforeach
                        @else 
                        ---
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-info btn-sm">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <a href="{{ route('doctors.edit', $user->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <form style="display: inline" method="post" action="{{ route('doctors.destroy', $user->id) }}">
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
        {{ $users->links() }}
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