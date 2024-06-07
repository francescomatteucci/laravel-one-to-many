<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|max:150|string',
        'content' => 'nullable|string'
        ]);
        $form_data = $request->all();
        $base_slug = Str::slug($form_data['title']);
        $slug = $base_slug;
        $n = 0;
        do{
            $find = Post::where('slug', $slug)->first();
            if ($find !== null){
                $n++;
                $slug = $base_slug .'-' . $n;
            }
        }   while ($find !== null);
        {

            $form_data['slug'] = $slug;
            $post = Post::create($form_data);
        }

        return to_route('admin.posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:150|string',
            'slug' => ['required','max:255',Rule::unique('posts')->ignore($post->id)],
            'content' => 'nullable|string'
            ]);
            $form_data = $request->all();
            $post->update($form_data);

            return to_route('admin.posts.show',$post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.posts.index');
    }
}