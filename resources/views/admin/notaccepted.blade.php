@extends('admin.layout')

@section('content')

<h1>Manage Orders</h1><br>

<?php  $oldid  ="";  ?>
@foreach ($orders as $order)

<?php
    
    

    if($oldid==$order['id']){
        $oldid=$order['id']; 
        ?>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">UserId</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        
      </tr>
    </thead>
    <tbody>
  

    <tr>
        <th scope="row">{{$order['id']}}</th>
        <td>{{$order['user_id']}}</td>
        <td>{{$order['title']}}</td>
        <td>{{$order['price']}}</td>
       
      </tr>

     
     
    </tbody>
  </table>

    <?php }else{
         $oldid=$order['id']; 
        ?>
        

<div style="margin-bottom:70px "></div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">UserId</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        
      </tr>
    </thead>
    <tbody>
  

    <tr>
        <th scope="row">{{$order['id']}}</th>
        <td>{{$order['user_id']}}</td>
        <td>{{$order['title']}}</td>
        <td>{{$order['price']}}</td>
       
      </tr>


     
     
     
    </tbody>
  </table>

    <?php } ?>
    
@endforeach




@endsection