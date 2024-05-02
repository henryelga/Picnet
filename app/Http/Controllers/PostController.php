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

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'caption' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/images');

        $post = auth()->user()->posts()->create([
            'caption' => $validatedData['caption'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('profile', auth()->user());
    }

    public function destroy(Post $post)
    {
        // Check if the authenticated user owns the post
        if ($post->user_id === auth()->id()) {
            $post->delete();
            return redirect()->route('profile', auth()->user())->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->route('profile', auth()->user())->with('error', 'You are not authorized to delete this post.');
        }
    }

    public function edit(Post $post)
    {
        // Check if the authenticated user owns the post
        if ($post->user_id === auth()->id()) {
            return view('posts.edit', compact('post'));
        } else {
            return redirect()->route('profile', auth()->user())->with('error', 'You are not authorized to edit this post.');
        }
    }

    public function update(Request $request, Post $post)
    {
        // Check if the authenticated user owns the post
        if ($post->user_id === auth()->id()) {
            $validatedData = $request->validate([
                'caption' => 'required|string|max:255',
            ]);

            $post->update($validatedData);
            return redirect()->route('profile', auth()->user())->with('success', 'Post updated successfully.');
        } else {
            return redirect()->route('profile', auth()->user())->with('error', 'You are not authorized to update this post.');
        }
    }


}
