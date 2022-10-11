<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <style>
      .btn-color{
  background-color: #0e1c36;
  color: #fff;
  
}

.profile-image-pic{
  height: 200px;
  width: 200px;
  object-fit: cover;
}



.cardbody-color{
  background-color: #ebf2fa;
}

a{
  text-decoration: none;
}
   </style>
</head>
<body>

   <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <h2 class="text-center text-dark mt-5">Admin Login Form</h2>
          <div class="text-center mb-5 text-dark"> 
            @if (session()->has('message'))

            <div style="">
                <p style="color: red">{{session('message')}}</p>
            </div>
               
            @endif</div>
         
          <div class="card my-5">
  
            <form action="/admins/login" method="POST" class="card-body cardbody-color p-lg-5">
                @csrf
  
              <div class="text-center">
                <img src="https://www.kindpng.com/picc/m/52-526237_avatar-profile-hd-png-download.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                  width="200px" alt="profile">
              </div>
  
              <div class="mb-3">
                <input name="username" type="text" class="form-control" id="Username" aria-describedby="emailHelp"
                  placeholder="username">
                  @error('username')
                  <p style="color: red">{{$message}}</p>
              @enderror
              </div>
              <div class="mb-3">
                <input name="password" type="password" class="form-control" id="password" placeholder="password">
                @error('password')
                  <p style="color: red">{{$message}}</p>
              @enderror
              </div>
              <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
              <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                Registered? <a href="/admins/register" class="text-dark fw-bold"> Create an
                  Account</a>
              </div>
            </form>
          </div>
  
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</body>
</html>