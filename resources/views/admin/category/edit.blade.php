@extends('layouts.admin')
<title>create Category</title>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">edit category ({{ $category->name }})</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.category.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Categories</span>
                </a>
            </div>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.category.update', $category->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name', $category->name) }}"
                                   class="form-control">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="parent_id">Parent</label>
                        <select name="parent_id" class="form-control">
                            <option value="">---</option>
                            @forelse($mainCategories as $mainCategory)
                                <option value="{{ $mainCategory->id }}"
                                    {{ old('parent_id', $category->parent_id) == $mainCategory->id ? 'selected' : null }}>
                                    {{ $mainCategory->name }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @error('parent_id')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : null }}>
                                Active
                            </option>
                            <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : null }}>
                                Inactive
                            </option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-12">
                        <label for="cover">Cover</label>
                        <br>
                        <div class="">
                            <input type="file" name="cover" id="category-image" class="file-input-overview"
                                   onchange="readURL(this)">
                            <span class="form-text text-muted">Image width should be 500px x 500px</span>
                            @error('cover')<span class="text-danger">{{ $message }}</span>@enderror

                        </div>
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function () {
            $("#category-image").fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if ($category->cover != '')
                        "{{ asset("assets/categories/covers/".$category->cover) }}"
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.querySelector("#category-image").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>




@endsection
