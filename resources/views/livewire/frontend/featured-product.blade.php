<section class="py-5">
    <header>
        <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
        <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
    </header>
    <div class="row">
        @foreach($featuredProducts as $product)
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="product text-center">
                    <div class="position-relative mb-3">
                        <div class="badge text-white bg-"></div>
                        <a class="d-block" href="{{route('product.show',$product->id)}}"><img class="img-fluid w-100"
                                                                   src="{{asset('front/img/product-1.jpg')}}"
                                                                   alt="..."></a>

                        <div class="product-overlay">
                            <ul class="mb-0 list-inline">
                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="{{route('product.show',$product->id)}}"><i
                                            class="far fa-heart"></i></a></li>
                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{route('product.show',$product->id)}}"> view Product</a></li>
                            </ul>
                        </div>
                    </div>
                    <h6><a class="reset-anchor" href="">{{$product->name}}
                            ({{$product->attributes->first()->color}}) </a></h6>
                    <p class="small text-muted">{{$product->attributes->first()->price}}$</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
