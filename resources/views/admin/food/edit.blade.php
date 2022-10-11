@extends('admin.layout')

@section('content')
<br>
<h1>Update Food</h1><br><br>

<form method="POST" action="/foods/{{$food['id']}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" class="form-control" id=""  placeholder="Title" value="{{$food['title']}}">
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" class="form-control" placeholder="description">{{$food['description']}}</textarea>
      </div>
      <div class="form-group">
        <label for="">Price</label>
        <input name="price" type="number" class="form-control" id="" placeholder="price" value="{{$food['price']}}">
      </div><br>

      <div class="form-group">
        <label for="">Current Image:</label>
        <img style="width:100px ;height:60px;" src="{{$food['image'] ? asset('storage/'.$food['image']) : asset('images/no-image.jpeg') }}" />
      </div><br>

    <div class="form-group">
      <label for="">Image</label>
      <input type="file" name="image" id="" placeholder="image">
    </div>


    <div class="form-group">
        <label  for="">Category:</label>
        <select name="category">

            @foreach ($categories as $category)

            <option {{$food['id']==$category['id']? 'selected' : ''}} value="{{$category['id']}}">{{$category['title']}}</option>
                
            @endforeach
            
            

        </select>
    </div>


    <div class="form-check">
      <input type="checkbox" name="featured" class="form-check-input" id="" {{$food['featured']=="Yes" ? 'checked' : ''}}>
      <label class="form-check-label" for="">Featured</label>
    </div>

   

    <div class="form-check">
        <input type="checkbox" name="active" class="form-check-input" id="" {{$food['active']=="Yes" ? 'checked' : ''}}>
        <label class="form-check-label" for="">Active</label>
      </div>
      <br>
      <input name="oldimage" type="hidden" value="{{$food['image']}}">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


  @endsection