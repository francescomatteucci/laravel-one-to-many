@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Nuovo Post</h1>
       <div class="container">
        <form action="{{ route('admin.posts.update',$post) }}"  method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" name="title" class="form-label">Title</label>
                <input class="form-control" id="title" name="title" placeholder="Titolo Post" value="{{ old('title',$post->title) }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria:</label>
               <select name="category_id" id="category_id">
                <option value="">--Seleziona Categoria --</option>
                @foreach ($categories as $category)
                    <option @selected($category->id == old ('category_id', $post->category_id) ) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

               </select>
              </div>

            <div class="mb-3">
                <label for="slug" name="slug" class="form-label">Slug</label>
                <input class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug',$post->slug) }}">
            </div>

              <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea name="content" class="form-control" id="content" placeholder="Contenuto del post" value="{{ old('content',$post->content) }}"></textarea>
              </div>
              <button class="btn btn-success">Modifica</button>
        </form>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
       </div>
    @endsection
    