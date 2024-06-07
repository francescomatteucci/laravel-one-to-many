@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Singolo Post</h1>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->slug }}</p>
    </div>
    <div class="container">
        {!! $post->content !!}
    </div>
    <button class="btn btn-primary">
        <a href="{{ route('admin.posts.index') }}" class="text-decoration-none text-light">Posts</a>
    </button>
    @endsection