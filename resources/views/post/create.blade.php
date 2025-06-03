@extends('layouts.main')
@section('content')
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Post title</label>
            <div class="col-sm-10">
                <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="title">
            </div>
            @error('title')
            <p class="text-danger">{{ $message }}</p>   
            @enderror
        </div>
        <div class="row mb-3">
            <label for="content" class="col-sm-2 col-form-label">Post content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>
            </div>
            @error('content')
            <p class="text-danger">{{ $message }}</p>   
            @enderror
        </div>
        <div class="row mb-3">
            <label for="image" class="col-sm-2 col-form-label">Post image</label>
            <div class="col-sm-10">
                <input value="{{ old('image') }}" type="text" class="form-control" name="image" id="image">
            </div>
            @error('image')
            <p class="text-danger">{{ $message }}</p>   
            @enderror
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="category_id">
            @foreach ($categories as $category)
                <option
                    {{ old('category_id') == $category->id ? 'selected' : ''}}

                value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
            @foreach ($tags as $tag)
                <option
                
                {{ /* TODO: save selection when error*/ }}

                value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
