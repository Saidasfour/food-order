@extends('admin.layout')

@section('content')

<h1>Manage Orders</h1><br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">UserId</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Location</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>
<?php  $oldid  ="";  ?>
@foreach ($orders as $order)

<?php
    
    if($order['status']=='Delivered') {
        $color='green';

    }else if($order['status']=='Out For Delivery'){
        $color='orange';
    }else{
        $color='red';
    }

    if($oldid==$order['id']){
        $oldid=$order['id']; 
        ?>

<tr>
    <th style="border: none;" scope="row">{{$order['id']}}</th>
    <td style="border: none;">{{$order['user_id']}}</td>
    <td style="border: none;">{{$order['title']}}</td>
    <td style="border: none;">{{$order['price']}}</td>
    <td style="border: none;">{{$order['location']}}</td>
    <td style="border: none;color:{{$color}}">{{$order['status']}}</td>
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
        <td></td>
       
      </tr>

    <tr>
        <th scope="row">{{$order['id']}}</th>
        <td>{{$order['user_id']}}</td>
        <td>{{$order['title']}}</td>
        <td>{{$order['price']}}</td>
        <td>{{$order['location']}}</td>
        <td style="color:{{$color}}">{{$order['status']}}</td>
        <td>
            <?php 
                
                if($order['status']=='Delivered'){?>

                <?php } else{ ?>

                    <a href="/outfordelivery/{{$order['id']}}" style="margin-right: 10px" class="btn btn-warning">Out For Delivery</a><a href="/delivered/{{$order['id']}}" class="btn btn-success">Delivered</a>

                <?php } ?>
                
                
           
        </td>
       
      </tr>


   <?php
  
}

    ?>




    
@endforeach

     
     
     
    </tbody>
  </table>


@endsection