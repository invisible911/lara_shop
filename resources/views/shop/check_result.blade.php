@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    
@include('partials.error')

@endsection



@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
@endsection