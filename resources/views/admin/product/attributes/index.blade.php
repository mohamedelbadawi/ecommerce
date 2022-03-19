@extends('layouts.admin')
<title>{{$product->name}}</title>
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"> {{$product->name}} </h6>
            <div class="ml-auto">
                <a href="{{ route('admin.product.attribute.create',$product->id) }}" class="btn btn-primary d-flex px-2">
                    <span class="icon text-white-50">
                        <em class="fa fa-plus"></em>
                    </span>
                    <p class="text m-auto"> Add new property</p>
                </a>
            </div>
        </div>
    </div>

    <div class="table-resposive">
        {{-- @include('backend.products.filter.filter') --}}
        <table class="table table-hover">
            <thead>
            <tr>
                <th>size</th>
                <th>color</th>
                <th>stock</th>
                <th>price</th>
                <th class="text-center" width="30px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($product->attributes as $attribute)

                <tr>

                    <td>
                            <span class="bg bg-primary p-2 rounded m-1 text-light">
                            {{$attribute->size}}
                            </span>

                    </td>
                    <td>
                            <span class="m-1 rounded-circle" style="background:{{$attribute->color}} ;  height: 25px;
                                width: 25px;
                                border-radius: 50%;
                                display: inline-block;">
                            </span>
                    </td>
                    <td>{{ $attribute->price }}</td>
                    <td>{{ $attribute->stock }}</td>

                    <td>
                        <div class="btn-group ">
{{--                            @dd($attribute->id);--}}
                            <a href="{{ route('admin.product.attribute.edit', [$product->id,$attribute->id]) }}"
                               class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-{{ $attribute->id }}').submit(); } else { return false; }"
                               class="btn btn-danger">
                                <em class="fa fa-trash danger"></em>
                            </a>
                            <form action="{{ route('admin.product.attribute.delete',[$product->id ,$attribute->id]) }}"
                                  method="post"

                                  id="delete-product-{{ $attribute->id }}" class="d-none">

                                @csrf
                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No properties found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>


@endsection
