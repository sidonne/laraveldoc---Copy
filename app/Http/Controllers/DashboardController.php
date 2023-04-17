<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

     public function index(){

        // $posts = Post::all();

        // //$posts = auth()->user()->posts;

        // return view('dashboard', compact('posts'));

        $posts = Post::with('category', 'user')->latest()->get();

        return view('post.index', compact('posts'));

    }

}
