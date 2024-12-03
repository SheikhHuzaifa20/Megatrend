@extends('layouts.main')
@section('content')

<style>

</style>
    <section class="header">
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @foreach ($banners as $banners)
                            <div class="banner_img">
                                <a href="/megatrend/public/product-detail/6">
                                <img src="{{ $banners->banners1 }}" class="img-fluid" alt="">
                            </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <div class="banner_content">
                            <span class="ms-5">$868</span>
                            <a href="/megatrend/public/product-detail/6" class="banner_price_btn ms-2">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="banner_product_details">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($home as $home)
                            <div class="banner_product">
                                <h1>{{ $home->heading1 }}</h1>
                                <p>
                                    consectetur adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore
                                </p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

        <section class="mouse">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mouse_img text-center">
                            <img src="{{ url('assets/images/mouse.png') }}" width="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>


    <!---categories--->
    <section class="collection">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="mens_collection">
                        <div class="mens_collection_content">
                            <p>EXPLORE</p>
                            <h1>{{ $home->heading2 }}</h1>
                            <h1>{{ $home->heading3 }}</h1>
                            <p>#NEWYEAR 2022</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="sports">
                        <img src="{{ asset($banners->banners3) }}" alt="">
                    </div>
                </div>


                <div class="col-md-2">
                    <div class="sports">
                        <img src="{{ asset($banners->banners4) }}" alt="">
                    </div>
                </div>

            </div>

            <div class="second_category my-3">
                <div class="row">
                    <div class="col-md-2">
                        <div class="sports boy">
                            <img src="{{ asset($banners->banners5) }}" alt="">
                            <div class="boy_content">
                                <p>EXPLORE</p>
                                <h1>{{ $home->heading4 }}</h1>
                                <span>#NEWYEAR 2022</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="sports girl">
                            <img src="{{ asset($banners->banners6) }}" alt="">
                            <p>{{ $home->heading5 }}</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="black_girl_collection">
                            <div class="mens_collection_content text-white">
                                <p>EXPLORE</p>
                                <h1>{{ $home->heading6 }} </h1>
                                <h1>{{ $home->heading7 }}</h1>
                                <span>#EXCLUSIVE</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!---categories--->

    <!---featured products--->

    <section class="featured_products ps-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured_products_heading">
                        <h1>{{ $home->heading8 }}</h1>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($data as $key => $value)
                    <div class="col-md-3">
                        <div class="products_card ms-5">
                            <div class="products">
                                <div class="products_card_img text-center">
                                    <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                        <img src="{{ asset($value->image) }}" class="img-fluid" alt="">
                                    </a>
                                </div>

                                <div class="products_card_details">
                                    <div class="products_content_top">
                                        <div class="products_name">
                                            <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                                <p>{{ $value->product_title }}<br>
                                                    {{ $value->categery }}</p>
                                            </a>
                                        </div>
                                        <div class="products_colors">
                                            <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                                <span class="color_box_black">
                                                    <img src="{{ url('assets/images/black_color.png') }}" alt="">
                                                </span>
                                                <span class="color_box_gray">
                                                    <img src="{{ url('assets/images/gray_color.png') }}" alt="">
                                                </span>
                                                <span class="color_box_orange">
                                                    <img src="{{ url('assets/images/orange_color.png') }}" alt="">
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="products_content_bottom">
                                        <div class="products_price">
                                            <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                                <span>${{ $value->price }}</span>
                                            </a>
                                        </div>
                                        <div class="products_shopping_cart">
                                            <span class="products_like">
                                                <img src="{{ url('assets/images/icon-love-active.png') }}" alt="">
                                            </span>
                                            <a href="javascript:void(0)" class="addToCart"
                                                data-product-id="{{ $value->id }}">
                                                <span class="shop_cart">
                                                    <img src="{{ url('assets/images/shop_cart.png') }}" alt="">
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="view_more_products text-center">
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---featured products--->

    <!---summer collection--->

    <section class="summer_collection">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="summer_one">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="summer_two">
                        <div class="summer_two_content">
                            <p>SUMMER COLLECTION</p>
                            <h1>{{ $home->heading9 }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="summer_three">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---summer collection--->

    <!----delivery----->

    <section class="delivery text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="free_delivery">
                        <div class="free_delivery_content">
                            <img src="{{ url('assets/images/van.png') }}" alt="">
                            <p>Free Delivery</p>
                            <span>
                                from $40
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="free_delivery">
                        <div class="free_delivery_content">
                            <img src="{{ url('assets/images/star_blue.png') }}" alt="">

                            <p>Free Delivery</p>
                            <span>
                                Brand
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="free_delivery">
                        <div class="free_delivery_content">
                            <img src="{{ url('assets/images/time24.png') }}" alt="">

                            <p>Free Delivery</p>
                            <span>
                                for free return
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="free_delivery">
                        <div class="free_delivery_content">
                            <img src="{{ url('assets/images/mesg.png') }}" alt="">

                            <p>Free Delivery</p>
                            <span>
                                99% Real Data
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="free_delivery">
                        <div class="free_delivery_content">
                            <img src="{{ url('assets/images/payment.png') }}" alt="">

                            <p>Free Delivery</p>
                            <span>
                                Secure
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!----delivery----->


    <!---recent arrial--->

    <section class="recent ps-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="recent_heading text-center">
                        <h1>{{ $home->heading10 }}</h1>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($product as $key => $value)
                    <div class="col-md-3">
                        <div class="recent_products_card ms-5">
                            <div class="recent_products">
                                <div class="recent_products_card_img  text-center">
                                    <a href="{{ route('productdetail', ['id' => $value->id]) }}">
                                        <hr>
                                        <img src="{{ asset($value->image) }}" class="img-fluid" alt="">
                                        <hr>
                                    </a>
                                </div>
                                <br><br>
                                <div class="recent_products_card_details">
                                    <div class="recent_products_content_top">
                                        <div class="products_name">
                                            <p>{{ $value->product_title }}<br>
                                                {{ $value->categery }}</p>
                                        </div>
                                        <div class="products_colors">
                                            <span class="color_box_black">
                                                <img src="{{ url('assets/images/black_color.png') }}" alt="">
                                            </span>
                                            <span class="color_box_gray">
                                                <img src="{{ url('assets/images/gray_color.png') }}" alt="">

                                            </span>
                                            <span class="color_box_orange">
                                                <img src="{{ url('assets/images/orange_color.png') }}" alt="">
                                            </span>
                                        </div>
                                    </div>

                                    <div class="recent_products_content_bottom">
                                        <div class="recent_products_price">
                                            <span>${{ $value->price }}</span>
                                        </div>
                                        <div class="recent_products_shopping_cart">
                                            <span class="products_like">
                                                <img src="{{ url('assets/images/icon-love-active.png') }}"
                                                    alt="">
                                            </span>
                                            <a href="javascript:void(0)" class="addToCart "
                                                data-product-id="{{ $value->id }}">
                                                <span class="shop_cart">
                                                    <img src="{{ url('assets/images/shop_cart.png') }}" alt="">
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="recent_view_more_products text-center">
                        <a href="#">View More</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!---recent arrial--->

    <!---recent Blogs--->

    <section class="recent_blogs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="recent_blogs_content text-center">
                        <h1>{{ $home->heading11 }}</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <br> eiusmod tempor incididunt
                            ut labore
                        </p>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-md-4">
                    <div class="recent_blog_card">
                        <div class="card">
                            <img src="{{ url('assets/images/recent_one.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span class="card-title me-3">
                                    <img src="{{ url('assets/images/notify_mesg.png') }}" alt="">
                                    1
                                </span>
                                <span class="card-title">
                                    <img src="{{ url('assets/images/notifylike.png') }}" alt="">
                                    32
                                </span>

                                <span class="card-title">
                                    <p>Belive it or not walking on air</p>
                                </span>
                                <p class="card-text">
                                    A shadowy flight into the well dangeous world of anima mans who does not just like end.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent_blog_card">
                        <div class="card">
                            <img src="{{ url('assets/images/recent_two.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span class="card-title me-3">
                                    <img src="{{ url('assets/images/notify_mesg.png') }}" alt="">
                                    1
                                </span>
                                <span class="card-title">
                                    <img src="{{ url('assets/images/notifylike.png') }}" alt="">
                                    32
                                </span>

                                <span class="card-title">
                                    <p>Belive it or not walking on air</p>
                                </span>
                                <p class="card-text">
                                    A shadowy flight into the well dangeous world of anima mans who does not just like end.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent_blog_card">
                        <div class="card">
                            <img src="{{ url('assets/images/recent_three.jpg') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span class="card-title me-3">
                                    <img src="{{ url('assets/images/notify_mesg.png') }}" alt="">
                                    1
                                </span>
                                <span class="card-title">
                                    <img src="{{ url('assets/images/notifylike.png') }}" alt="">
                                    32
                                </span>

                                <span class="card-title">
                                    <p>Belive it or not walking on air</p>
                                </span>
                                <p class="card-text">
                                    A shadowy flight into the well dangeous world of anima mans who does not just like end.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
