@extends('layouts.master')

@section('content')

    @include('partials.error')

    @if(isset($messages))

        <div class="alert alert-success">

            <ul>
                @foreach ($messages->all() as $message)
                
                    <li>{{ $message }}</li>

                @endforeach

            </ul>   

        </div>
            
    @endif


    <div class="col-sm-8 col-md-6">
        <form method="POST" action="/add_new_product" id="product-update-form">
            <div class="thumbnail">    
                <div class="caption">
                    <h3>Please Type in Product item information </h3>
                </div>
                <div class="row">
                    <div class="form-group pull-left">
                        <div class="input-group input-group-sm">
                            <label for="title">  Title:</label>
                              <input type="text" class="form-control" name="title"  >
                        </div>
                    </div>

                    <div class="form-group pull-left">
                        <div class="input-group input-group-sm">
                            <label for="image">  ImagePath:</label>
                            <input type="text" class="form-control" name="imagePath"  >
                        </div>
                    </div>

                    <div class="form-group pull-left">
                        <div class="input-group input-group-sm">
                            <label for="desc">  Description:</label>
                             <textarea  class="form-control" rows="5" name="description" > the descriptions </textarea>
                        </div>
                    </div>
                   
                   <div class="form-group pull-left">
                         <div class="input-group input-group-sm">
                          <label for="price">  price:</label>
                          <span >$</span>
                          <input type="text" class="form-control" name="price" value = 10>
                        </div>
                    </div>
         
                    <div class="form-group pull-left">
                        <div class="input-group input-group-sm">
                             <label for="price">  instock:</label>
                             <input type="text" class="form-control" name="instock"  value = 50 >
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    {{csrf_field()}}
                    <button  type="submit" class = 'btn btn-primary pull-right' > add </button>
                </div>
            </div>
        </form>

    </div>


@endsection
