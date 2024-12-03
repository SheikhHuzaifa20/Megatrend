@extends('layouts.main')
@section('content')

<div  class="d-flex justify-content-end">
    <a href="{{route("view_product")}}" class="btn btn-primary" >View Product</a>
</div>

    <main class="my-cart my-5">
        <div class="my-account-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="myaccount-page-wrapper">
                            <div class="row">
                                <div class="col-lg-9 col-md-8 acc-tab-content-start">
                                    <div class="tab-content" id="myaccountContent">
                                        <h1 class="text">Add Products</h1>

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <!-- Error Message -->
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form class=" text" method="POST" action="{{ route('add_product.store') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="product_title" class="form-label">Product Title</label>
                                                <input type="text" name="product_title" id="product_title"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="feature_product" class="form-label">Feature Product</label>
                                                <select name="feature_product" id="feature_product" class="form-control"
                                                required>
                                                {{-- <option value="" disabled selected>Select Category</option> --}}
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                                <!-- Add more categories as needed -->
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="categery" class="form-label">categery</label>
                                            <select name="categery" id="categery" class="form-control"
                                                required>
                                                {{-- <option value="" disabled selected>Select Category</option> --}}
                                                <option disabled selected>Select Categery</option>
                                                <option>Shoes</option>
                                                <option>Sunglasses</option>
                                                <option>Watch</option>
                                                <option>Sunglasses</option>
                                                <option>Cloth</option>
                                                <!-- Add more categories as needed -->
                                            </select>
                                        </div>

                                            <div class="mb-3">
                                                <label for="price" class="form-label">Product Price</label>
                                                <input type="number" name="price" id="price" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Product Description</label>
                                                <textarea id="description" name="description" class="form-control" placeholder="Write something.."></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="image" class="form-label">Product Image</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>

                                        
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->


        <!-- main content end -->
    </main>


@endsection
    <script type="text/javascript">
        $(document).on('click', ".btn1", function(e) {
            // alert('it works');
            $('.loginForm').submit();
        });


        if ($('#summary-ckeditor').length != 0) {
            CKEDITOR.replace('summary-ckeditor');
        }
    </script>

