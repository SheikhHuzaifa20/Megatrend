@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <div class="row align-items-center">
            <form action="{{ route('order.place') }}" method="POST" id="order-place">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <h1>Billing Address</h1>
                    <!-- Ensure all form fields have the correct names matching the validation rules -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input style="color: black" type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="adress" class="form-label">Address</label>
                        <input style="color: black" type="text" name="adress" id="adress" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Town/City</label>
                        <input style="color: black" type="text" name="city" id="city" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input style="color: black" type="number" name="phone" id="phone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input style="color: black" type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="postcode" class="form-label">Postcode</label>
                        <input style="color: black" type="text" name="postcode" id="postcode" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="Ordernote" class="form-label">Order Note</label>
                        <textarea style="color: black" class="form-control" name="Ordernote" id="Ordernote" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1>YOUR ORDER</h1>
                    <div class="card my-5">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo" data-payment="stripe">
                                    Pay with Credit Card <img src="{{ asset('images/payment1.png') }}" alt=""
                                        width="150">
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"
                            style="display: block;">
                            <div class="card-body">
                                <div class="stripe-form-wrapper require-validation"
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" data-cc-on-file="false">
                                    <div id="card-element"></div>
                                    <div id="card-errors" role="alert"></div>
                                    <div class="form-group">
                                        {{-- <a href="{{route('remove_cart', $item['id'])}}" class="PaYmEnT btn btn-red btn-block" type="button" id="stripe-submit">Pay
                                            Now $</a> --}}
                                            <button class="PaYmEnT btn btn-red btn-block" type="button" id="stripe-submit">Pay
                                                Now $</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection


