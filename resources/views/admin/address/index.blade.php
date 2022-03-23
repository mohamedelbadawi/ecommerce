@extends('layouts.admin')
<title>users addresses</title>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"> addresss </h6>
            <div class="ml-auto">
                <a href="" class="btn btn-primary d-flex px-2">
                    <span class="icon text-white-50">
                        <em class="fa fa-plus"></em>
                    </span>
                    <p class="text m-auto"> Add new address</p>
                </a>
            </div>
        </div>
    </div>

    <div class="table-resposive">
        @include('admin.address.filter.filter')
        <table class="table table-hover">
            <thead>
            <tr>
                <th>user</th>
                <th>street address</th>
                <th>city</th>
                <th>post code</th>

                <th class="text-center" width="30px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($addresses as $address)

                <tr>


                    <td>{{ $address->user->name }}</td>
                    <td>{{ $address->street_address }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->code }}</td>

                    <td>
                        <div class="btn-group ">

                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-address-address-{{ $address->id }}').submit(); } else { return false; }"
                               class="btn btn-danger">
                                <em class="fa fa-trash danger"></em>
                            </a>
                            <form action="{{ route('admin.address.delete', $address->id) }}" method="post"
                                  id="delete-address-address-{{ $address->id }}" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No Addresses found
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <div class="float-right">
                        {!! $addresses->links('pagination::bootstrap-4') !!}
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>



@endsection
