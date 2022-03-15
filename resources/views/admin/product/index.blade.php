@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"> Products </h6>
            <div class="ml-auto">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary d-flex px-2">
                    <span class="icon text-white-50">
                        <em class="fa fa-plus"></em>
                    </span>
                    <p class="text m-auto"> Add new product</p>
                </a>
            </div>
        </div>
    </div>

    <div class="table-resposive">
        {{-- @include('backend.products.filter.filter') --}}
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>category</th>
                <th>sizes</th>
                <th>colors</th>
                <th>total stock</th>
                <th>Featured</th>
                <th>Status</th>
                <th>Created at</th>
                <th class="text-center" width="30px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($products as $product)

                <tr>


                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>@foreach($product->sizes() as $size)
                            <span class="bg bg-primary p-2 rounded m-1 text-light">
                            {{$size}}
                            </span>
                        @endforeach

                    </td>
                    <td>@foreach($product->colors() as $color)
                            <span class="m-1 rounded-circle" style="background:{{$color}} ;  height: 25px;
                                width: 25px;
                                border-radius: 50%;
                                display: inline-block;">
                            </span>
                        @endforeach</td>
                    <td>{{ $product->totalStock() }}</td>
                    <td>{{ $product->featured ? 'yes' : 'No' }}</td>
                    <td class="text-light"> <span
                            class="{{ $product->status ? 'bg bg-success' : 'bg bg-danger' }} p-2 rounded">

                                {{ $product->status() }}
                            </span>
                    </td>
                    <td>{{ $product->createdAt() }}</td>
                    <td>
                        <div class="btn-group ">
                            <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-success">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-product-{{ $product->id }}').submit(); } else { return false; }"
                               class="btn btn-danger">
                                <em class="fa fa-trash danger"></em>
                            </a>
                            <form action="{{ route('admin.product.delete', $product->id) }}" method="post"
                                  id="delete-product-product-{{ $product->id }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No products found
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <div class="float-right">
                        {!! $products->links('pagination::bootstrap-4') !!}
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>



@endsection
