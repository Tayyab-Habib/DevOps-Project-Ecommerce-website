@extends('layouts.front')

@section('title')
    SK Shop
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2><center>Featured Products</center></h2>
                <div class="owl-carousel featured-carousel owl-theme mb-3">
                    @foreach($featured_products as $prod)
                        <div class="item">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <span class="float-start">PKR {{ $prod->selling_price }}</span>
                                    <span class="float-end"><s>PKR {{ $prod->original_price }}</s></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2><center>Categories</center></h2>
                <div class="owl-carousel featured-carousel owl-theme mb-3">
                    @foreach($trending_category as $cate)
                        <div class="item">
                            <a href="{{ url('category/'.$cate->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $cate->name }}</h5>
                                        <p>
                                            {{ $cate->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection
