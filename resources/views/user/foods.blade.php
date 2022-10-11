@extends('user.user-layout')

@section('content')

 <!-- fOOD sEARCH Section Starts Here -->
 <x-search-card  />
<!-- fOOD sEARCH Section Ends Here -->


<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

       @foreach ($foods as $food)

       <x-food-card :food="$food"  />
           
       @endforeach

        
        


       

        


        <div class="clearfix"></div>

        

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

@endsection