@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"> Product Categories</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.tag.create') }}" class="btn btn-primary d-flex px-2">
                    <span class="icon text-white-50">
                        <em class="fa fa-plus"></em>
                    </span>
                    <p class="text m-auto"> Add new tag</p>
                </a>

            </div>
        </div>
    </div>

    <div class="table-resposive">
{{--        @include('backend.tags.filter.filter')--}}
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
{{--                <th>Products count</th>--}}
                <th>Status</th>
                <th>Created at</th>
                <th class="text-center" width="30px">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($tags as $tag)

                <tr>
                    <td>{{ $tag->name }}</td>
{{--                    <td>{{ $tag->products_count }}</td>--}}
                    <td class="text-light">
                            <span class="{{ $tag->status? 'bg bg-success' : 'bg bg-danger' }} p-2 rounded">

                                {{ $tag->status() }}
                            </span>
                    </td>
                    <td>{{ $tag->createdAt() }}</td>
                    <td>
                        <div class="btn-group ">
                            <a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0);"
                               onclick="if (confirm('Are you sure to delete this record?')) { document.getElementById('delete-tag-{{ $tag->id }}').submit(); } else { return false; }"
                               class="btn btn-danger">
                                <em class="fa fa-trash danger"></em>
                            </a>
                            <form action="{{ route('admin.tag.delete', $tag->id) }}" method="post"
                                  id="delete-tag-{{ $tag->id }}" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        No Tags found
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <div class="float-right">
                        {!! $tags->links('pagination::bootstrap-4') !!}
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
