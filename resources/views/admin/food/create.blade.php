@extends('admin.layout')

@section('content')
<br>
<h1>Add Food</h1><br><br>

<form method="POST" action="/foods" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" class="form-control" id=""  placeholder="Title">
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" class="form-control" placeholder="description"></textarea>
      </div>
      <div class="form-group">
        <label for="">Price</label>
        <input name="price" type="number" class="form-control" id="" placeholder="price">
      </div>

    <div class="form-group">
      <label for="">Image</label>
      <input type="file" name="image" id="" placeholder="image">
    </div>


    <div class="form-group">
        <label  for="">Category:</label>
        <select name="category">

            @foreach ($categories as $category)

            <option value="{{$category['id']}}">{{$category['title']}}</option>
                
            @endforeach
            
            

        </select>
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