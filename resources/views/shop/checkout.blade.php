@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            @php
                $total_price = Session::get('total_price','please check your shopping cart.');
            @endphp

            <h4>Your Total: ${{ $total_price }}</h4>
            <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
                {{ Session::get('error') }}
            </div>
            <form action="/checkout" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" required name="name">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" class="form-control" required name="address">
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card_name">Card Holder Name</label>
                            <input type="text" id="card_name" class="form-control" required name="card_name">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card_number">Credit Card Number</label>
                            <input type="text" id="card_number" class="form-control" required name="card_number" value= 5500005555555559>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card_expiry_date">Credit Card Expiration Date</label>
                            <input type="month" id="card_expiry_date" class="form-control" required name="card_expiry_date">
                        </div>
                    </div>

                    
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card_cvc">CVC</label>
                            <input type="text" id="card_cvc" class="form-control" required name="card_cvc">
                        </div>
                    </div>

                    <tr>
                       <td><input type="hidden" name="total_price" id="total_price" value= {{Session::get('total_price',0)}} ></td>
                    </tr>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Buy now</button>
            </form>
        </div>
    </div>
@include('partials.error')

@endsection



@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
@endsection