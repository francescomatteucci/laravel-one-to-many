@extends('layouts.app')
@section('content')
    <div class="container">
        
            <table class="table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col"><button class="btn btn-primary"><a href="{{ route('admin.posts.create') }}" class="text-decoration-none text-light">Nuovo post</a></button></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    
                    <tr>
                        <td>{{ $post->id}}</td>
                        <td><a href="{{ route('admin.posts.show',$post) }}"></a>{{ $post->title}}</td>
                        <td>{{ $post->slug}}</td>
                        <td> <button class="btn btn-success"><a href="{{ route('admin.posts.edit',$post) }}" class="text-decoration-none text-light">Edit</a></button> </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table> 
    </div>
    @endsection
    