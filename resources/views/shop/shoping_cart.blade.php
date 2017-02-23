@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(empty($products))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div>
        
    @else
        @php
        $total_price = 0;
        @endphp
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                            <li class="list-group-item">
                                @php
                                    $total_price = $total_price + $product->pivot->quantity*$product->price 
                                @endphp
                                <span class="badge">{{ $product->pivot->quantity }}</span>
                                <strong>{{ $product->title }}</strong>
                                <span class="label label-success">{{ $product->price }}</span>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toogle" data-toggle="dropdown">Edit <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="reduce 1">reduce by 1</a></li>
                                        <li><a href="add 1">reduce by 1</a></li>
                                        <li><a href="remove all">remove</a></li>
                                    </ul>
                                </div>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$total_price }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="/checout" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @endif
@endsection