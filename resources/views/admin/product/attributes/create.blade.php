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


                    <div class="col-6">
                        <label for="color">color</label>
                        <select name="color" class="form-control">
                            @foreach($colors as $color)
                                <option value="{{$color}}">{{$color}}</option>
                            @endforeach
                        </select>
                        @error('size')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>


                    <div class="col-6">
                        <label for="size">size</label>
                        <select name="size" class="form-control">
                            @foreach($sizes as $size)
                                <option value="{{$size}}">{{$size}}</option>
                            @endforeach
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
