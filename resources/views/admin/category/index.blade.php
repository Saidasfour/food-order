@extends('admin.layout')

@section('content')

<h1>Manage Category</h1><br>

@if (session()->has('message'))

<div style="">
    <p style="color: green">{{session('message')}}</p>
</div>
   
@endif

<a href="/categories/create" class="btn btn-primary">Add Category</a>
<br />
<br>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Image</th>
        <th scope="col">Featured</th>
        <th scope="col">Active</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)

        <tr>
            <th scope="row">{{$category['id']}}</th>
            <td>{{$category['title']}}</td>
            <td><img style="width:100px ;height:60px;" src="{{$category['image'] ? asset('storage/'.$category['image']) : asset('images/no-image.jpeg') }}" /></td>
            <td>{{$category['featured']}}</td>
            <td>{{$category['active']}}</td>
            <td><a href="/categories/{{$category['id']}}/edit" style="margin-right: 10px;" class="btn btn-success">Update Category</a>
               <form method="POST" action="/categories/{{$category['id']}}" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete Category</button>
            </form> </td>
          </tr>
            
        @endforeach
      
     
    </tbody>
  </table>


    
@endsection