@extends('layouts.main')
@section('content')

    <div class="d-flex justify-content-end">
        <a href="" class="btn btn-primary">View Product</a>
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
                                        <h1 class="text">Add items</h1>

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

                                        <form class=" text" action="{{ route('add_banners.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="banner1" class="form-label">Banner 1</label>
                                                <input type="file" name="banners1" id="banner1"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner2" class="form-label">Banner 2</label>
                                                <input type="file" name="banners2" id="banner2"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner3" class="form-label">Banner 3</label>
                                                <input type="file" name="banners3" id="banner3"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner4" class="form-label">Banner 4</label>
                                                <input type="file" name="banners4" id="banner4"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner5" class="form-label">Banner 5</label>
                                                <input type="file" name="banners5" id="banner5"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner6" class="form-label">Banner 6</label>
                                                <input type="file" name="banners6" id="banner6"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner7" class="form-label">Banner 7</label>
                                                <input type="file" name="banners7" id="banner7"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner8" class="form-label">Banner 8</label>
                                                <input type="file" name="banners8" id="banner8"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner9" class="form-label">Banner 9</label>
                                                <input type="file" name="banners9" id="banner9"
                                                    class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="banner10" class="form-label">Banner 10</label>
                                                <input type="file" name="banners10" id="banbanner10ner1"
                                                    class="form-control">
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
