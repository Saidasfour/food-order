@extends('admin.layout')

@section('content')


<!-- Main Content Section -->
    
<div class="main" style="background-color:#eee ;padding:30px;">
    <h1 style="margin-bottom: 30px;">Dashboard</h1>
    <?php 
     
    
    ?>
    <div class="row">
        
    <div class="col-3 card text-center" style="width: 18rem;border-color:white ;margin:auto">
  <div class="card-body">
    <h5 class="card-title">{{$countcategory}}</h5>
    <p class="card-text">Categories</p>
    
  </div>
</div>
<div class="col-3 card text-center" style="width: 18rem;border-color:white ;margin:auto" >
  <div class="card-body">
    <h5 class="card-title">${{$balance}}</h5>
    <p class="card-text">Balance</p>
    
  </div>
</div>
<div class="col-3 card text-center" style="width: 18rem;border-color:white ;margin:auto ">
  <div class="card-body">
    <h5 class="card-title">{{$countdelivered}}</h5>
    <p class="card-text">Delivered orders</p>
    
  </div>
</div>
</div>
    </div>
    
    <!-- End Main Section -->

    @endsection