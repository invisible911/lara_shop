@extends('layouts.master')

@section('content')

        @foreach($orders as $order)
            @php
                $total_price = 0
            @endphp
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Ordered on {{$order->created_at}}</h3>
                    <li class="list-group-item">
                        <b>{{'user email: '.App\User::find($order->user_id)->email}}</b>
                    </li>
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

@section('pages_link')
    <div class="row">
        {{ $orders->links() }}
    </div>
@endsection

@endsection