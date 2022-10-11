@props(['food'])

 <div class="food-menu-box">
    <div class="food-menu-img">
        <img style="height: 100px; ; width: 120px;border-radius:10px;" src="{{$food['image'] ? asset('storage/'.$food['image']) : asset('images/no-image.jpeg') }}" />
    </div>

    <div class="food-menu-desc">
        <h4>{{$food['title']}}</h4>
        <p class="food-price">${{$food['price']}}</p>
        <p class="food-detail">
            {{$food['description']}}
        </p>
        <br>

        <a href="/addtocart/{{$food['id']}}" class="btn btn-primary">Add to Cart</a>
    </div>
</div>