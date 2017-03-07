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



    <form class="navbar-form pull-left" method="POST" action="/add_new_product" id="product-update-form">
        <div class="caption">
                <h3>Please Type in Product item information </h3>
        </div>
       <ul class="breadcrumb">

           <li >
               <label for="title">  Title:</label><br>
               <input type="text" class="form-control" name="title"  >
           </li><br><hr>

           <li>
               <label for="image">  ImagePath:</label><br>
               <input type="text" class="form-control" name="imagePath"  >
           </li><br><hr>

           <li>
                <label for="desc">  Description:</label><br>
                 <textarea  class="form-control" rows="5" name="description" > the descriptions </textarea>
           </li><br><hr>

           <li>
               <label for="price">  price:</label><br>
                      <span >$</span>
              <input type="text" class="form-control" name="price" value = 10>
           </li><br><hr>

           <li>
               <label for="price">  instock:</label><br>
                <input type="text" class="form-control" name="instock"  value = 50 >
           </li><br><hr>
           <li class="pull-right">
              {{csrf_field()}}
                <button  type="submit" class = 'btn btn-primary  ' > add </button>
           </li>
            <br>
            <br>
       </ul> 


    </form>


@endsection
