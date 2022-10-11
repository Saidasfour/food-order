@extends('admin.layout')

@section('content')

<h1>Manage Orders</h1><br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Location</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>
<?php  $oldid  ="";  ?>
@foreach ($orders as $order)

<?php
    
    

    if($oldid==$order['id']){
        $oldid=$order['id']; 
        ?>

<tr>
    <th style="border: none;" scope="row">{{$order['id']}}</th>
    <td style="border: none;">{{$order['username']}}</td>
    <td style="border: none;">{{$order['title']}}</td>
    <td style="border: none;">{{$order['price']}}</td>
    <td style="border: none;">{{$order['location']}}</td>
    <td style="border: none;"></td>
   
  </tr>
   <?php }else{
    $oldid=$order['id']; 
    ?>
    
    
      <tr style="height:60px;">
        <th scope="row"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
       
      </tr>

    <tr>
        <th scope="row">{{$order['id']}}</th>
        <td>{{$order['username']}}</td>
        <td>{{$order['title']}}</td>
        <td>{{$order['price']}}</td>
        <td>{{$order['location']}}</td>
        <td><a href="/acceptorder/{{$order['id']}}" style="margin-right: 10px" class="btn btn-success">Accept</a><a href="/reject/{{$order['id']}}" class="btn btn-danger">Reject</a></td>
       
      </tr>


   <?php
  
}

    ?>




    
@endforeach

     
     
     
    </tbody>
  </table>


@endsection