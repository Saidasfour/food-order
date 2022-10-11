@props(['category'])

<a href="/category/{{$category['id']}}">
    <div class="box-3 float-container">
        <img style="height: 200px; ; width: 350px;border-radius:5px;" src="{{$category['image'] ? asset('storage/'.$category['image']) : asset('images/no-image.jpeg') }}" />

        <h3 class="float-text text-white">{{$category['title']}}</h3>
    </div>
    </a>