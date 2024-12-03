@section('title', 'Register')
@extends('layouts.main')
@section('content')

    <section class="inner-banner my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="contact-form my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-info">
                        <h2>LOGIN YOUR ACCOUNT</h2>
                        <div class="row">
                            <div class="col-12">

                                @if ($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Your Email *</label>
                                        <input style="color: black;" type="email" name="email" class="form-control" placeholder=""
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Your Password *</label>
                                        <input style="color: black;" type="password" name="password" class="form-control" placeholder=""
                                            required="">
                                    </div>
                                    <div class="row">
                                        <label class="remember"><input type="checkbox"> Remember me </label>
                                    </div>
                                    <input style="color: black; background-color: rgb(47, 143, 239)" type="submit" value="LOGIN" class="btn form-btn form-control">
                                </form>
                                <a href="{{ route('signup') }}">Don't have an account? Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script></script>
@endsection
