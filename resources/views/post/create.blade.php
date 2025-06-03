@extends('layouts.main')
@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Post title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title">
            </div>
        </div>
        <div class="row mb-3">
            <label for="content" class="col-sm-2 col-form-label">Post content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" id="content"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="image" class="col-sm-2 col-form-label">Post image</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="image" id="image">
            </div>
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="category_id">
            <option selected>Open this select menu</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <select class="form-select" multiple aria-label="multiple select example" name="tags">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
