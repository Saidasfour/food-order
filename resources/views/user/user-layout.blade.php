{{-- @auth --}}
{{-- @php

if (!$this->auth->check()) {
        return redirect('/login');
    }
    
@endphp --}}
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="{{asset('images/logo.png')}}" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/category">Categories</a>
                    </li>
                    <li>
                        <a href="/food">Foods</a>
                    </li>
                    <li>
                        <a href="/ordersinfo">Orders</a>
                    </li>
                    <li>
                        <form style="display: inline" action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-light">Logout</button>
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

            <div class="clearfix"></div>
        </div>
    </section>


    @yield('content');


    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
{{-- @else

@php

redirect('/login')->with('message','Login First');
    
@endphp

@endauth --}}