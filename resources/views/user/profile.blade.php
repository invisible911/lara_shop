@extends('layouts.master')

@section('content')
    @php
        $user = Auth::user();
    @endphp
    @if(!$user->isadmin)
        <div class="panel panel-success">
            <div class="panel-heading">
                    <h3 class="panel-title">User infromation</h3>
            </div>

            <div class="panel-body">
                <li class="list-group-item">
                    <b>{{'Name: '.$user->name }}</b>
                </li>
                <li class="list-group-item">
                    <b>{{'Email: '.$user->email}}</b>
                </li>
            </div>
        </div>
        <hr>

        <h3>Your Orders</h3>

        @foreach($orders as $order)
            @php
                $total_price = 0
            @endphp
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Ordered on {{$order->created_at}}</h3>
                    <li class="list-group-item">
                        <b>{{'Name: '.$order->name}}</b>
                    </li>
                    <li class="list-group-item">
                        <b>{{'Address: '.$order->address}}</b>
                    </li>
                </div>

                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($order->product as $product) <br>
                            <li class="list-group-item">
                                <span class="badge">${{ $product->price }}</span>
                                {{ $product->title }} | {{ $product->pivot->quantity }} Units
                            </li>
                            @php
                                $total_price = $total_price + $product->price*$product->pivot->quantity 
                            @endphp
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                    <strong>Total Price: ${{ $total_price }}</strong>
                </div>
            </div>

        @endforeach
    @else
        <div class="panel panel-success">
            <div class="panel-heading">
                    <h3 class="panel-title">Admin Info</h3>
            </div>

            <div class="panel-body">
                <li class="list-group-item">
                    <b>{{'Name: '.$user->name }}</b>
                </li>
                <li class="list-group-item">
                    <b>{{'Email: '.$user->email}}</b>
                </li>
            </div>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading">

                    <h3 class="panel-title">Orders</h3>

            </div>

            <div class="panel-body">
                <li class="list-group-item">
                    <b> <a href="/orders">Checking Orders</a></b>
                </li>
            </div>

        </div>

        <div class="panel panel-success">
            <div class="panel-heading">

                    <h3 class="panel-title">Stock control</h3>

            </div>

            <div class="panel-body">
                <li class="list-group-item">
                    <b> <a href="/edit_product">Updating products</a></b>
                </li>
                <li class="list-group-item">
                    <b><a href="/add_new_product">Adding a product</a></b>
                </li>
               
            </div>
        </div>


    @endif
@endsection