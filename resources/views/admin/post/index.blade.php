@extends('layouts.admin')
@section('content')
    <div>
        <div>
            <a href="{{ route('post.create') }} "class="btn btn-primary mb-3">Create post</a>
        </div>
        @foreach ($posts as $post)
            <div><a href=" {{ route('post.show', $post->id) }} ">{{ $post->id }}. {{ $post->title }}</a></div>
        @endforeach
        <div class="container">
            {{ $posts->withQueryString()->links() }}
        </div>
    </div>
@endsection
