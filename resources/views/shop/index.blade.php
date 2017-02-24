@extends('layouts.master')

@section('title')
    Laravel Shop
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{{ $product->description }}</p>
                            <div class="clearfix">
                                <div class="pull-left price">${{ $product->price }}</div><br>
                                <div class="pull-left price">{{ $product->instock }} avaliable</div>
                                <form method="POST" action="/addtocart/{{$product->id}}">
                                    {{csrf_field()}}
                                    <button role="button" type="submit" class = 'btn btn-primary pull-right' >Add to Cart </button>
                                    }
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection

@section('pages_link')
    <div class="row">
        {{ $products->links() }}
    </div>
@endsection
