@extends('user.user-layout')

@section('content')

 


<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">{{$category['title']}}</h2>

       @foreach ($foods as $food)

       <x-food-card :food="$food"  />
           
       @endforeach

        
        


       

        


        <div class="clearfix"></div>

        

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

@endsection