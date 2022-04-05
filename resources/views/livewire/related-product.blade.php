<div class="row">
    <!-- PRODUCT-->
    @foreach($products as $product)
        <div class="col-lg-3 col-sm-6">
            <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="detail.blade.php"><img
                            class="img-fluid w-100" src="{{asset('front/img/product-1.jpg')}}" alt="..."></a>
                    <div class="product-overlay">
                        <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark"
                                                                    href="#!"><i class="far fa-heart"></i></a>
                            </li>
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="#!">Add to
                                    cart</a></li>
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark"
                                                                 href="#productView" data-bs-toggle="modal"><i
                                        class="fas fa-expand"></i></a></li>
                        </ul>
                    </div>
                </div>
                <h6><a class="reset-anchor" href="{{route('product.show',$product->id)}}">{{$product->name}}</a></h6>
                <p class="small text-muted">{{$product->attributes->first()->price}}</p>
            </div>
        </div>
    @endforeach
</div>
