


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav  class="navbar navbar-expand-lg navbar-light bg-white" style="padding-right: 130px;padding-left: 130px;background-color:white;margin-bottom:30px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><img style="width:100px;height:40px" src="{{asset('images/logo.png')}}" alt="Restaurant Logo" class="img-responsive"></a>
      
        <div style="display:flex;margin-left:600px ;margin-top:15px" class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li style="margin-right:10px " class="nav-item active">
              <a style="color: #ff6b81;font-weight:bold"  class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li  style="margin-right:10px " class="nav-item active">
                <a style="color: #ff6b81;font-weight:bold" class="nav-link" href="/category">Categories <span class="sr-only">(current)</span></a>
              </li>
              <li  style="margin-right:10px " class="nav-item active">
                <a style="color: #ff6b81;font-weight:bold" class="nav-link" href="/food">Foods <span class="sr-only">(current)</span></a>
              </li>
              <li  style="margin-right:10px " class="nav-item active">
                <a style="color: #ff6b81;font-weight:bold" class="nav-link" href="/ordersinfo">Orders <span class="sr-only">(current)</span></a>
              </li>
              <li>
                <form style="display: inline" action="/logout" method="POST">
                    @csrf
                    <button style="background: #D3D3D3" type="submit" class="btn btn">Logout</button>
                </form>
                
            </li>
            <li>
                <a href="/cart"><img style="width: 50px;height:40px;position:absolute;right:10px;top:20px" src="images/bag.png" alt="">
                
              <?php 
                if($bagscount>0){?>
                    <div style="position: absolute;background-color:red;width:20px;height:20px;right:10px;top:25px;border-radius:30px;color:white;display:flex;align-items:center;justify-content:center;font-size:13px">{{$bagscount}}</div>
                <?php }else{ ?>

              <?php  }?>
                
                
                
                </a>
            </li>
          </ul>
         
        </div>
      </nav>
    <h1>Orders Info</h1><br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">UserName</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Location</th>
        <th scope="col">Status</th>
        
        
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
    <td style="border: none;">{{$order['username']}}</td>
    <td style="border: none;">{{$order['title']}}</td>
    <td style="border: none;">{{$order['price']}}</td>
    <td style="border: none;">{{$order['location']}}</td>
    <td style="border: none;color:{{$color}}">{{$order['status']}}</td>
    
   
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
        <td style="color:{{$color}}">{{$order['status']}}</td>
        
       
      </tr>


   <?php
  
}

    ?>




    
@endforeach

     
     
     
    </tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


