@extends('user.user-layout')

@section('content')

<!-- fOOD sEARCH Section Starts Here -->


<x-search-card  />


<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        @if (session()->has('message'))

<div style="">
    <p style="color: green">{{session('message')}}</p>
</div>
   
@endif
        <h2 class="text-center">Explore Foods</h2>

        @foreach ($categories as $category)
        <x-category-card :category="$category"  />
        @endforeach

       

       

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        
        @foreach ($foods as $food)

       <x-food-card :food="$food"  />
            
        @endforeach

        

       

       

        

        

       


        <div class="clearfix"></div>

        

    </div>

    <p class="text-center">
        <a href="/food">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->
    
@endsection