@extends('layouts.admin')
<title> Categories</title>
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary d-flex px-2">
                    <span class="icon text-white-50">
                        <em class="fa fa-plus"></em>
                    </span>
                    <p class="text m-auto"> Add new Category</p>
                </a>
            </div>
        </div>
    </div>

    <div class="table-resposive">
        {{--        @include('backend.product_categories.filter.filter')--}}
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Parent</th>
                <th>Status</th>
                <th>Created at</th>
                <th class="text-center" width="30px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($categories as $category)

                <tr>
                    <td>{{ $category->name }}</td>
                    {{--                    <td>{{ $category->products_count }}</td>--}}

                    <td>{{ $category->parent ? $category->parent->name : '' }}</td>
                    <td class="text-light">
                            <span class="{{ $category->status ? 'bg bg-success' : 'bg bg-danger' }} p-2 rounded">
                                {{ $category->status() }}
                            </span>
                    </td>
                    <td>{{ $category->createdAt()}}</td>
                    <td>
                        <div class="btn-group ">
                            <a href="{{route('admin.category.edit',$category->id)}}"
                               class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-product-category-{{ $category->id }}').submit(); } else { return false; }"
                               class="btn btn-danger">
                                <em class="fa fa-trash danger"></em>
                            </a>
                            <form action="{{route('admin.category.delete',$category->id)}}" method="get"
                                  id="delete-product-category-{{ $category->id }}" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No categories found
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <div class="float-right">
                        {!! $categories->links('pagination::bootstrap-4') !!}
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>

    </div>
@endsection


