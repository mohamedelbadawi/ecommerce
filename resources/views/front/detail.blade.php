@extends('layouts.front')
@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <!-- PRODUCT SLIDER-->
                    <div class="row m-sm-0">
                        <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                            <div class="swiper product-slider-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                                                                                 src="{{asset('front/img/product-detail-1.jpg')}}"
                                                                                                 alt="..."></div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                                                                                 src="{{asset('front/img/product-detail-2.jpg')}}"
                                                                                                 alt="..."></div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                                                                                 src="{{asset('front/img/product-detail-3.jpg')}}"
                                                                                                 alt="..."></div>
                                    <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100"
                                                                                                 src="{{asset('front/img/product-detail-4.jpg')}}"
                                                                                                 alt="..."></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10 order-1 order-sm-2">
                            <div class="swiper product-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view"
                                                                        href="{{asset('front/img/product-detail-1.jpg')}}"
                                                                        data-gallery="gallery2"
                                                                        data-glightbox="Product item 1"><img
                                                class="img-fluid" src="{{asset('front/img/product-detail-1.jpg')}}"
                                                alt="..."></a></div>
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view"
                                                                        href="{{asset('front/img/product-detail-2.jpg')}}"
                                                                        data-gallery="gallery2"
                                                                        data-glightbox="Product item 2"><img
                                                class="img-fluid" src="{{asset('front/img/product-detail-2.jpg')}}"
                                                alt="..."></a></div>
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view"
                                                                        href="{{asset('front/img/product-detail-3.jpg')}}"
                                                                        data-gallery="gallery2"
                                                                        data-glightbox="Product item 3"><img
                                                class="img-fluid" src="{{asset('front/img/product-detail-3.jpg')}}"
                                                alt="..."></a></div>
                                    <div class="swiper-slide h-auto"><a class="glightbox product-view"
                                                                        href="{{asset('front/img/product-detail-4.jpg')}}"
                                                                        data-gallery="gallery2"
                                                                        data-glightbox="Product item 4"><img
                                                class="img-fluid" src="{{asset('front/img/product-detail-4.jpg')}}"
                                                alt="..."></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT DETAILS-->
                <livewire:add-to-cart :product="$product" >
                    <!-- DETAILS TABS-->
                    <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab"
                                                data-bs-toggle="tab"
                                                href="#description" role="tab" aria-controls="description"
                                                aria-selected="true">Description</a>
                        </li>

                    </ul>


                    <div class="tab-content mb-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                             aria-labelledby="description-tab">
                            <div class="p-4 p-lg-5 bg-white">
                                <h6 class="text-uppercase">Product description </h6>
                                <p class="text-muted text-sm mb-0">{{$product->description}}</p>
                            </div>
                        </div>
                    </div>


                    <!-- RELATED PRODUCTS-->
                    <h2 class="h5 text-uppercase mb-4">Related products</h2>
                    <livewire:related-product :category_id="$product->category->id">
            </div>
    </section>
@endsection
