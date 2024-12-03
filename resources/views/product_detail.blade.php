@extends('layouts.main')
@section('content')
    <section class="detail_products ps-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-products">
                        <div class="product-slides ">
                            <div class="item">
                                <div class="img-carousel">
                                    <a href="#select_one">
                                        <img src="{{ asset($products->image) }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="detail-one">
                        <h1>{{ $products->product_title }}</h1>
                        <h5>${{ $products->product_title }}</h5>
                        <p>{{ $products->description }}</p>

                        <div class="countre-div">
                            <div class="plus-minus counter">
                                <button class="counter-span decrement">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <span class="counter-span count">1</span>
                                <button class="counter-span increment">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <form id="addToCartForm" action="{{ route('save_cart') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                <input type="hidden" name="product_title" value="{{ $products->product_title }}">
                                <input type="hidden" name="price" value="{{ $products->price }}">
                                <input type="hidden" name="quantity" value="1" id="quantity">
                                <div class="view_more_products text-center">
                                    <button type="submit" class="btn btn-primary">ADD TO CART</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

