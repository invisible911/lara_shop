@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

@include('partials.error')

@if($is_success)
	<h3>Order made successfully.</h3>

	<hl>
	<ul class="list-group">
	    @foreach($products as $product)
	            <li class="list-group-item">
	                <span class="badge">{{ $product->pivot->quantity }}</span>
	                <strong>{{ $product->title }}</strong>
	            </li>
	    @endforeach
	</ul>

	<div class="panel panel-success">
            <div class="panel-heading">
                    <h3 class="panel-title">Will Shopping To</h3>
            </div>

			<div class="panel-body">
				<li class="list-group-item">
					<b>{{'Name: '.$name}}</b>
				</li>
				<li class="list-group-item">
					<b>{{'Address: '.$address}}</b>
				</li>
			</div>
	</div>
@endif
	<div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <div class="btn-toolbar" role="toolbar" >
            <a href="/home" type="button" class="btn btn-success">Back</a>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
@endsection