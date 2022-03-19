@extends('layouts.admin')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            {{$product->name}}
        </div>
        <div class="card-body ">
            <form class="" method="post" action="{{route('admin.product.attribute.store',$product->id)}}">
                @csrf
                <div class="row">

                    <div class="col-6 form-group">

                        <label for="ColorInput" class="form-label">Color picker</label>
                        <input type="color" class="form-control form-control-color" name="color" id="ColorInput"
                               title="Choose your color">
                    </div>
                    <div class="col-6">
                        <label for="size">size</label>
                        <select name="size" class="form-control">
                            <option value="xs">xs</option>
                            <option value="s">s</option>
                            <option value="m">m</option>
                            <option value="l">l</option>
                            <option value="xl">xl</option>
                            <option value="xxl">xxl</option>
                            <option value="3xl">3xl</option>
                            <option value="4xl">4xl</option>
                            <option value="5xl">5xl</option>
                            <option value="6xl">6xl</option>
                        </select>
                        @error('size')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                            @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="stock">stock</label>
                            <input type="number" name="stock" value="{{ old('stock') }}" class="form-control">
                            @error('stock')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add property</button>
            </form>
        </div>
    </div>


@endsection
