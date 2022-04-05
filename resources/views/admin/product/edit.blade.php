@extends('layouts.admin')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="card shadow mb-4 p-2">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">edit product</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.product.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">products</span>
                </a>
            </div>
        </div>

            <form action="{{route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name',$product->name) }}"
                                   class="form-control">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" style="resize:none;"
                                      class=" form-control summernote"
                                      value="{{ old('description') }}"
                                      class="form-control">{{$product->description}}</textarea>
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status',$product->status) == 1 ? 'selected' : null }}>Active
                            </option>
                            <option value="0" {{ old('status',$product->status) == 0 ? 'selected' : null }}>Inactive
                            </option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-3">
                        <label for="featured">Feature</label>
                        <select name="featured" class="form-control">
                            <option value="1" {{ old('featured',$product->featured) == 1 ? 'selected' : null }}>Yes
                            </option>
                            <option value="0" {{ old('featured',$product->featured) == 0 ? 'selected' : null }}>No
                            </option>
                        </select>
                        @error('featured')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-6">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control ">
                            <option value="">Choose Category</option>
                            @forelse($categories as $Category)
                                <option value="{{ $Category->id }}"
                                    {{ old('category_id',$product->category_id) == $Category->id ? 'selected' : null }}>
                                    {{ $Category->name }}</option>
                            @empty
                            @endforelse
                        </select>
                        @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="tags">tags</label>
                        <select name="tags[]" class="form-control select2 @error('tags')border-danger @enderror" multiple="multiple">
                            @forelse($tags as $tag)
                                <option value="{{ $tag->id }}"
                                        @if(in_array($tag->id,$productTags)) selected @endif >{{ $tag->name }}</option>
                            @empty
                            @endforelse
                        </select>
                        @error('tags')<span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-12">
                        <label for="Images">Images</label>
                        <br>
                        <div class="file-loading">
                            <input type="file" name="Images[]" multiple="multiple" id="products-image"
                                   class="file-input-overview">
                            <span class="form-text text-muted">Image width should be 500px x 500px</span>
                            @error('Images')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">update product</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function () {
            function matchStart(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }
                // Skip if there is no 'children' property
                if (typeof data.children === 'undefined') {
                    return null;
                }
                // `data.children` contains the actual options that we are matching against
                var filteredChildren = [];
                $.each(data.children, function (idx, child) {
                    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                    }
                });
                // If we matched any of the timezone group's children, then set the matched children on the group
                // and return the group object
                if (filteredChildren.length) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.children = filteredChildren;
                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }
                // Return `null` if the term should not be displayed
                return null;
            }

            $(".select2").select2({
                tags: true,
                closeOnSelect: false,
                minimumResultsForSearch: Infinity,
                matcher: matchStart
            });
            $("#products-image").fileinput({
                theme: "fas",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @foreach ($product->media as $media)
                        "{{ asset('assets/products/' . $media->image_name) }}",
                    @endforeach
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',

            })


        });
    </script>
@endsection
