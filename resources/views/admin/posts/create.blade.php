@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Nuovo Post</h1>
       <div class="container">
        <form action="{{ route('admin.posts.store') }}"  method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" name="title" class="form-label">Title</label>
                <input class="form-control" id="title" name="title" placeholder="Titolo Post" value="{{ old('title') }}">
              </div>

              <div class="mb-3">
                <label for="category_id" class="form-label">Categoria:</label>
               <select name="category_id" id="category_id">
                <option value="">--Seleziona Categoria --</option>
                @foreach ($categories as $category)
                    <option @selected($category->id == old ('category_id') ) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

               </select>
              </div>

              <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea name="content" class="form-control" id="content" placeholder="Contenuto del post" value="{{ old('content') }}"></textarea>
              </div>
              <button class="btn btn-success">Crea</button>
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
    