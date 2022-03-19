@extends('layouts.admin')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            {{$product->name}}
        </div>
        <div class="card-body ">
            <form class="" method="post" action="{{route('admin.product.attribute.update',[$product->id,$productAttribute->id])}}">
                @csrf
                @method('PATCH')
                <div class="row">

                    <div class="col-6 form-group">

                        <label for="ColorInput" class="form-label">Color picker</label>
                        <input type="color" class="form-control form-control-color" name="color" id="ColorInput"
                               value="{{$productAttribute->color}}"
                               title="Choose your color">
                    </div>
{{--                    @dd($productAttribute->price)--}}
                    <div class="col-6">
                        <label for="size">size</label>
                        <select name="size" class="form-control">
                            <option @if($productAttribute->size=='xs') selected @endif value="xs">xs</option>
                            <option @if($productAttribute->size=='s') selected @endif value="s">s</option>
                            <option @if($productAttribute->size=='m') selected @endif value="m">m</option>
                            <option @if($productAttribute->size=='l') selected @endif value="l">l</option>
                            <option @if($productAttribute->size=='xl') selected @endif value="xl">xl</option>
                            <option @if($productAttribute->size=='xxl') selected @endif value="xxl">xxl</option>
                            <option @if($productAttribute->size=='3xl') selected @endif value="3xl">3xl</option>
                            <option @if($productAttribute->size=='4xl') selected @endif value="4xl">4xl</option>
                            <option @if($productAttribute->size=='5xl') selected @endif value="5xl">5xl</option>
                            <option @if($productAttribute->size=='6xl') selected @endif value="6xl">6xl</option>
                        </select>
                        @error('size')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="number" name="price" value="{{ old('price',$productAttribute->price) }}"
                                   class="form-control">
                            @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="stock">stock</label>
                            <input type="number" name="stock" value="{{ old('stock',$productAttribute->stock) }}"
                                   class="form-control">
                            @error('stock')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">update property</button>
            </form>
        </div>
    </div>


@endsection
