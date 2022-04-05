@extends('layouts.front')
@section('content')
    <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center"
                 style="background: url({{asset('front/img/hero-banner-alt.jpg')}})">
            <div class="container py-5">
                <div class="row px-4 px-lg-5">
                    <div class="col-lg-6">
                        <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                        <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark"
                                                                                        href="shop.blade.php">Browse
                            collections</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
            <header class="text-center">
                <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
                <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
            </header>
            <div class="row">
                <div class="col-md-6"><a class="category-item" href="shop.blade.php"><img class="img-fluid"
                                                                                          src="{{asset('front/'.$mainCategories[0]->cover)}}"
                                                                                          alt=""/><strong
                            class="category-item-title">{{$mainCategories[0]->name}}</strong></a>
                </div>


                <div class="col-md-6"><a class="category-item" href="shop.blade.php"><img class="img-fluid"
                                                                                          src="{{asset('front/'.$mainCategories[1]->cover)}}"
                                                                                          alt=""/><strong
                            class="category-item-title">{{$mainCategories[1]->name}}</strong></a>
                </div>
            </div>
        </section>


    <livewire:frontend.featured-product  />
@endsection
