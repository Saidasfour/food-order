@extends('admin.layout')

@section('content')
<br>
<h1>Edit Category</h1><br><br>

<form method="POST" action="/categories/{{$category['id']}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" class="form-control" id=""  placeholder="Title" value="{{$category['title']}}">
    </div><br>
    <div class="form-group">
        <label for="">Current Image</label>
        <img style="width:100px ;height:60px;" src="{{$category['image'] ? asset('storage/'.$category['image']) : asset('images/no-image.jpeg') }}" />
      </div><br>
    <div class="form-group">
      <label for="">Image</label>
      <input type="file" name="image" id="" placeholder="image">
    </div>
    <div class="form-check">
      <input type="checkbox" name="featured" class="form-check-input" id="" {{$category['featured']=="Yes" ? 'checked' : ''}}>
      <label class="form-check-label" for="">Featured</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="active" class="form-check-input" id="" {{$category['active']=="Yes" ? 'checked' : ''}}>
        <label class="form-check-label" for="">Active</label>
      </div>
      <br>
      <input name="oldimage" type="hidden" value="{{$category['image']}}">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


  @endsection