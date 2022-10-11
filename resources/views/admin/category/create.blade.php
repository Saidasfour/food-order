@extends('admin.layout')

@section('content')
<br>
<h1>Add Category</h1><br><br>

<form method="POST" action="/categories" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" class="form-control" id=""  placeholder="Title">
    </div>
    <div class="form-group">
      <label for="">Image</label>
      <input type="file" name="image" id="" placeholder="image">
    </div>
    <div class="form-check">
      <input type="checkbox" name="featured" class="form-check-input" id="">
      <label class="form-check-label" for="">Featured</label>
    </div>
    <div class="form-check">
        <input type="checkbox" name="active" class="form-check-input" id="">
        <label class="form-check-label" for="">Active</label>
      </div>
      <br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


  @endsection