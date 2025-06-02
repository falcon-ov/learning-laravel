@extends('layouts.main')
@section('content')
      <div>{{ $post->id }}. {{ $post->title }}</div>
      <div> {{ $post->content }} </div>
      <div>
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary mb-3">Edit</a>
      </div>
      <div>
        <form action="{{ route('post.delete', $post->id) }}" method="POST">
          @csrf
          @method('delete')
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </div>      
      <div>
        <a href="{{ route('post.index') }}" class="btn btn-primary mb-3">Back</a>
      </div>
@endsection