<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->search){

            $posts = Post::where('title', 'like', '%' . $request->search . '%')
            ->orwhere('content', 'like', '%' . $request->search . '%')->latest()->get();

        } else {

            $posts = Post::with('category', 'user')->latest()->get();

        }

        return view('post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        Post::create([

            'title' => $request->title,
            'content' => $request->content

        ]);

        return redirect()->route('dashboard')->with('success', 'Post has been created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        if (! Gate::allows('update-post', $post)){
            abort(403);
        }

        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $post->update([

            'title' => $request->title,
            'content' => $request->content,

        ]);

        return redirect()->route('dashboard')->with('success', 'Post has been Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if (! Gate::allows('destroy-post', $post)){
            abort(403);
        }

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post has been Deleted successfully');

    }
}
