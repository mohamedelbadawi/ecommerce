@extends('layouts.admin')
<title>Users</title>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary d-flex px-2">
                    <span class="icon text-white-50">
                        <em class="fa fa-plus"></em>
                    </span>
                    <p class="text m-auto">Create User</p>
                </a>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th class="text-center" width="30px">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)

            <tr>
                <td>{{ $user->name }}</td>

                <td>{{ $user->email}}</td>
                <td>{{ $user->createdAt()}}</td>
                <td>
                    <div class="btn-group ">
                        <a href="javascript:void(0);"
                           onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-user-{{ $user->id }}').submit(); } else { return false; }"
                           class="btn btn-danger">
                            <em class="fa fa-trash danger"></em>
                        </a>
                        <form action="{{route('admin.user.delete',$user->id)}}" method="get"
                              id="delete-user-{{ $user->id }}" class="d-none">
                            @csrf
                        </form>

                    </div>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    No users found
                </td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td colspan="6">
                <div class="float-right">
                    {!! $users->links('pagination::bootstrap-4') !!}
                </div>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection
