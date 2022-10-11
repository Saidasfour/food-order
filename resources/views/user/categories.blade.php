@extends('user.user-layout')

@section('content')

 <!-- fOOD sEARCH Section Starts Here -->
 <x-search-card  />
<!-- fOOD sEARCH Section Ends Here -->

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Categories</h2>

        @foreach ($categories as $category)

        <x-category-card :category="$category"  />
            
        @endforeach

        

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->




@endsection