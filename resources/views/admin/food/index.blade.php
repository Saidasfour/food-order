@extends('admin.layout')

@section('content')

<h1>Manage Food</h1><br>

@if (session()->has('message'))

<div style="">
    <p style="color: green">{{session('message')}}</p>
</div>
   
@endif

<a href="/foods/create" class="btn btn-primary">Add Food</a>
<br />
<br>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Category_id</th>
        <th scope="col">Title</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Featured</th>
        <th scope="col">Active</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($foods as $food)

        <tr>
            <th scope="row">{{$food['id']}}</th>
            <td>{{$food['category_id']}}</td>
            <td>{{$food['title']}}</td>
            <td>{{$food['price']}}</td>
            <td><img style="width:100px ;height:60px;" src="{{$food['image'] ? asset('storage/'.$food['image']) : asset('images/no-image.jpeg') }}" /></td>
            <td>{{$food['featured']}}</td>
            <td>{{$food['active']}}</td>
            <td><a href="/foods/{{$food['id']}}/edit" style="margin-right: 10px;" class="btn btn-success">Update Food</a>
               <form method="POST" action="/foods/{{$food['id']}}" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete Food</button>
            </form> </td>
          </tr>
            
        @endforeach
      
     
    </tbody>
  </table>


    
@endsection