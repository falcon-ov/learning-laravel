@extends('layouts.main')
@section('content')
<form action="{{ route('post.update', $post->id) }}" method="POST">
  @csrf
  @method('put')
  <div class="row mb-3">
    <label for="title" class="col-sm-2 col-form-label">Post title</label>
    <div class="col-sm-10">
      <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
    </div>
  </div>
  <div class="row mb-3">
    <label for="content" class="col-sm-2 col-form-label">Post content</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="content" id="content" >{{ $post->content }}</textarea>
    </div>
  </div>
  <div class="row mb-3">
    <label for="image" class="col-sm-2 col-form-label">Post image</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="image" id="image" value="{{ $post->image }}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection