<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $posts = $user->posts;
            $allPosts = Post::all();
            return view('posts.index', compact('posts', 'allPosts'));
        } else {
            $allPosts = Post::all();
            return view('posts.index', compact('allPosts'));
        }
    }
}
