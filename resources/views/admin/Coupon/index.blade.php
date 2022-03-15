@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"> Product Coupons</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary d-flex px-2">
                    <span class="icon text-white-50">
                        <em class="fa fa-plus"></em>
                    </span>
                    <p class="text m-auto"> Add new Coupon</p>
                </a>
            </div>
        </div>
    </div>

    <div class="table-resposive">
        {{--        @include('backend.coupons.filter.filter')--}}
        <table class="table table-hover">
            <thead>
            <tr>
                <th>code</th>
                <th>type</th>
                <th>value</th>
                <th>description</th>
                <th>use times</th>
                <th>used times</th>
                <th>start date</th>
                <th>expire date</th>
                <th>Min total</th>
                <th>status</th>
                <th class="text-center" width="30px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->type }}</td>
                    <td>{{ $coupon->value }}</td>
                    <td> {{ $coupon->description }}</td>
                    <td>{{ $coupon->use_times }}</td>
                    <td>{{ $coupon->used_time }}</td>
                    <td>{{ $coupon->start_date }}</td>
                    <td>{{ $coupon->expire_date }}</td>
                    <td>{{ $coupon->min_total?$coupon->min_total:'No min'}}</td>
                    <td class="text-light">
                            <span class="{{ $coupon->status ? 'bg bg-success' : 'bg bg-danger' }} p-2 rounded">
                                {{ $coupon->status() }}
                            </span>
                    </td>
                    <td>
                        <div class="btn-group ">
                            <a href="{{ route('admin.coupon.edit', $coupon->id) }}"
                               class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-coupon-{{ $coupon->id }}').submit(); } else { return false; }"
                               class="btn btn-danger">
                                <em class="fa fa-trash danger"></em>
                            </a>`
                            <form action="{{ route('admin.coupon.delete', $coupon->id) }}" method="post"
                                  id="delete-coupon-{{ $coupon->id }}" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No Coupons found
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <div class="float-right">
                        {!! $coupons->links() !!}
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>

    </div>
@endsection
