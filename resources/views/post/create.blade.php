@extends('layouts.main')
@section('content')
<form action="{{ route('post.store') }}" method="POST">
  @csrf
  <div class="row mb-3">
    <label for="title" class="col-sm-2 col-form-label">Post title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title">
    </div>
  </div>
  <div class="row mb-3">
    <label for="content" class="col-sm-2 col-form-label">Post content</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="content"></textarea>
    </div>
  </div>
  <div class="row mb-3">
    <label for="image" class="col-sm-2 col-form-label">Post image</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="image">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
@endsection