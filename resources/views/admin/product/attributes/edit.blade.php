@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Edit product</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">products</span>
                </a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                   class="form-control">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="Price">Price</label>
                            <input type="text" name="price" value="{{ old('price', $product->price) }}"
                                   class="form-control">
                            @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                                   class="form-control">
                            @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" style="resize:none;" class=" form-control summernote"
                                      class="form-control"> {!! old('description', $product->description) !!}</textarea>
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>






                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Update product</button>
                </div>
            </form>
        </div>
    </div>

@endsection
