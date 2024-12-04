<section class="footer">
    <div class="container">
        <div class="row border-bottom py-5">
            <div class="col-md-6">
                <div class="subscribe">
                    <p>Subscribe to our Newsletter</p>
                    <input
                    type="text"
                    placeholder="your@gmail.com"
                    class="input_email"
                    >
                    <a href="#">Send</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="social">
                    <span class="me-5">Social networks</span>
                    <span class="me-3">
                       <a href="https://www.instagram.com/">
                        <i class="fa-brands fa-instagram"></i>
                       </a>
                    </span>
                    <span class="me-3">
                        <a href="https://vimeo.com/">
                            <i class="fa-brands fa-vimeo-v"></i>
                        </a>
                     </span>
                     <span class="me-3">
                        <a href="https://www.pinterest.com/">
                            <i class="fa-brands fa-pinterest-p"></i>
                        </a>
                     </span>
                     <span class="me-3">
                        <a href="https://www.facebook.com/">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                     </span>
                     <span class="me-3">
                        <a href="#">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                     </span>
                </div>
            </div>
        </div>

        <div class="links py-5">
            <div class="row">
                <div class="col-md-2">
                    <div class="footer_content">
                        <p>DISCOVER</p>
                        <li>
                            <a href="#">Men</a>
                        </li>
                        <li>
                            <a href="#">Woman</a>
                        </li>
                        <li>
                            <a href="#">Lookbook</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="footer_content">
                        <p>VISIT</p>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Products</a>
                        </li>
                        <li>
                            <a href="contact">Contact Us</a>
                        </li>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer_content">
                        <p>USEFULL LINKS</p>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Products</a>
                        </li>
                        <li>
                            <a href="contact">Contact Us</a>
                        </li>
                    </div>
                </div>

                <div class="col-md-2">
                   <div class="footer_content">
                    <p>CONTACT US</p>

                    <span class="email">E-mail</span> <br>
                    <span class="emailAdd">shop@kissbykita.com</span>
                   </div>
                </div>

                <div class="col-md-2">
                   <div class="footer_content">
                    <p class="phone">PHONE</p>
                    <span class="number">(231) 375-4438</span>
                   </div>
                </div>

            </div>
        </div>
    </div>
</section>

<div class="offcanvas offcanvas-end right-modal-side cart-side-modal" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">SHOPPING CART</h5>
        <button type="button" class="text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
            <span class="btn-close"></span> Close
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="main-mid-canvas">
            <div class="modal-body" style="color: ;">
                @php
                    $cart = Session::get('cart', []);
                    $total = 0;
                @endphp

                @if (!empty($cart))
                    @foreach ($cart as $key => $item)
                        @php
                            $productId = $item['id'] ?? null;
                            $product = $productId ? App\Models\Product::find($productId) : null;
                        @endphp

                        <div class="row cart-items">
                            <div class="col-md-12 delete-cart">
                                <a href="{{route('remove_cart', $item['id'])}}" class="remove">
                                    <i class="fas fa-times">

                                    </i>
                                </a>
                            </div>
                            <div class="col-md-6 image">
                                <img height="100px" src="{{ asset($item['image']) }}"
                                    alt="">
                            </div>
                            <div class="col-md-6 text">
                                <h3>{{ $item['product_title'] ?? "" }}</h3>
                                <div class="product" data-product-id="{{ $productId }}">
                                    <p class="days">
                                        $<span class="cart-price">{{ $item['price'] * $item['quantity'] }}</span>
                                    </p>

                                    <p class="days">
                                        Quantity:
                                        <input type="number" value="{{ $item['quantity'] }}" name="quantity"
                                            class="input_qty form-control"
                                            style="width: 41% !important; margin-top: 10px;" min="1"
                                            data-product-price="{{ $item['price'] }}" readonly>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @php
                            $total += $item['price'] * $item['quantity'];
                        @endphp
                    @endforeach
                    <p>Total: $<span id="total-price">{{ $total }}</span></p>
                @else
                    <div class="col-lg-12">
                        <div class="gallery-img">
                            <div class="col-lg-12">
                                <div class="madal-logo">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </div>
                            </div>
                            <h5>NO PRODUCTS IN THE CART</h5>
                        </div>
                    </div>
                @endif
                @if (!empty($cart))
                <button type="button" class="btn btn-success" id="checkout"
                    onclick="window.location.href = '{{ route('checkout') }}'">Checkout</button>
            @else
                <button type="button" class="btn btn-success" id="checkout"
                    onclick="window.location.href = '{{ route('checkout') }}'" disabled>Checkout</button>
            @endif
            </div>
        </div>
    </div>
</div>
