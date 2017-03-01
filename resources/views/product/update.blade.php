@extends('layouts.master')

@section('content')
    @include('partials.error')

    @if(count($products)==0)  
        <h3>No products yet, add some first.</h3>
    @endif
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
        @foreach($productChunk as $product)
            <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            
                            <form method="POST" action="/edit_product/{{$product->id}}" id="product-update-form">
                                <div class="row">
                                    <div class="form-group pull-left">
                                        <div class="input-group input-group-sm">
                                            <label for="desc">  Description:</label>
                                             <textarea  class="form-control" rows="5" name="description" >{{$product->description}} </textarea>
                                        </div>
                                    </div>
                                   
                                   <div class="form-group pull-left">
                                         <div class="input-group input-group-sm">
                                          <label for="price">  price:</label>
                                          <span >$</span>
                                          <input type="text" class="form-control" name="price" value = {{$product->price}}>
                                        </div>
                                    </div>
                         
                                    <div class="form-group pull-left">
                                        <div class="input-group input-group-sm">
                                             <label for="price">  instock:</label>
                                             <input type="text" class="form-control" name="instock"  value = {{$product->instock}} >
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    {{csrf_field()}}
                                    <button  type="submit" class = 'btn btn-primary pull-right' >update </button>
                                </div>
                            </form>

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