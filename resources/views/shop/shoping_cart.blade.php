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
        <div class="panel panel-primary">
            <div class="panel-heading">
                    <h3 class="panel-title">Shopping Cart</h3>
            </div>
            @php
            $total_price = 0;
            @endphp
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <ul class="list-group">
                            @foreach($products as $product)
                                    <li class="list-group-item">
                                        @php
                                            $total_price = $total_price + $product->pivot->quantity*$product->price 
                                        @endphp
                                        <img src="{{ $product->imagePath }}" alt="..."  height = 80>
                                        <span class="badge">{{ $product->pivot->quantity }}</span>
                                        <strong>{{ $product->title }}</strong>
                                        <span class="label label-success">${{ $product->price }}</span>

                                        <div class="btn-toolbar" role="toolbar" >
                                            <div class="btn-group pull-right" role="group" aria-label="..." >
                                                <form method="POST" >
                                                    {{csrf_field()}}
                                                    <button role="button" type="submit" formAction="/addtocart/{{$product->id}}" class = 'btn btn-success btn-xs ' >add 1</button>
                                                    <button role="button" type="submit" formAction="/reduce1fromcart/{{$product->id}}" class = 'btn btn-warning btn-xs ' >reduce 1</button>
                                                    <button role="button" type="submit" formAction="/removefromcart/{{$product->id}}" class = 'btn btn-danger btn-xs ' >remove it</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                    <strong>Total: ${{$total_price }}</strong>
                    @php
                        Session::put('total_price',$total_price);
                        Session::put('order_product_list',$products);
                    @endphp
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <div class="btn-toolbar" role="toolbar" >
                <a href="/home" type="button" class="btn btn-success">Back</a>
                @if($total_price>0)
                    <a href="/checkout" type="button" class="btn btn-success">Checkout</a>
                @endif
                </div>
            </div>
        </div>
    @endif
@endsection