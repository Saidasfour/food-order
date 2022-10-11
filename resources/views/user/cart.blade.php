@extends('user.user-layout')

@section('content')


<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Cart</h2>

       @foreach ($foods as $food)

       <div class="food-menu-box">
        <div class="food-menu-img">
            <img style="height: 100px; ; width: 120px;border-radius:10px;" src="{{$food['image'] ? asset('storage/'.$food['image']) : asset('images/no-image.jpeg') }}" />
        </div>
    
        <div class="food-menu-desc">
            <h4>{{$food['title']}}</h4>
            <p class="food-price">${{$food['price']}}</p>
            <p class="food-detail">
                {{$food['description']}}
            </p>
            <br>

            <a href="/removefromcart/{{$food['id']}}" class="btn btn-primary">Remove from Cart</a>
    
            
        </div>
    </div>
           
       @endforeach

       

        
        


       

        


        <div class="clearfix"></div>
        <div style="width:100%;margin-top:30px">
            <a href="/order" style="display:flex;margin-left:auto;margin-right:auto;width:100px;align-items:center;justify-content:center;" type="button" class="btn btn-primary">Order Now</a>
        </div>
        

        

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

@endsection