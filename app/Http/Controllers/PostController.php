<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('index')->with(['posts' => $post->getBylimit()]);
    }
    
    public function create()
    {
        return view('create');
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post, 'comments' => $post->comments()->get()]);
    }
    
    public function edit(Post $post)
    {
        return view('edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
    $input_post = $request['post'];
    $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
    }
}

?>