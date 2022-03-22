@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">admins</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.create') }}" class="btn btn-primary d-flex px-2">
                    <span class="icon text-white-50">
                        <em class="fa fa-plus"></em>
                    </span>
                    <p class="text m-auto">Create admin</p>
                </a>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-center" width="30px">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($admins as $admin)

            <tr>
                <td>{{ $admin->name }}</td>

                <td>{{ $admin->email}}</td>
                <td>{{ $admin->getRoleNames()->first()}}</td>
                <td>
                    <div class="btn-group ">
                        <a href="{{ route('admin.edit', $admin->id) }}"
                           class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="javascript:void(0);"
                           onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-admin-{{ $admin->id }}').submit(); } else { return false; }"
                           class="btn btn-danger">
                            <em class="fa fa-trash danger"></em>
                        </a>
                        <form action="{{route('admin.delete',$admin->id)}}" method="get"
                              id="delete-admin-{{ $admin->id }}" class="d-none">
                            @csrf
                        </form>

                    </div>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    No admins found
                </td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <td colspan="6">
                <div class="float-right">
                    {!! $admins->links('pagination::bootstrap-4') !!}
                </div>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection
