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
            'caption' => 'required',
            'images.*' => 'required|image',
        ]);

        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $imagePaths[] = $image->store('posts', 'public');
        }

        $post = new Post();
        $post->caption = $validatedData['caption'];
        $post->image_paths = $imagePaths;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
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

    public function like(Request $request, Post $post)
    {
        $user = $request->user();

        if ($post->isLikedByUser($user)) {
            $post->likes()->where('user_id', $user->id)->delete();
            $liked = false;
        } else {
            $post->likes()->create(['user_id' => $user->id]);
            $liked = true;
        }

        $likeCount = $post->likes()->count();

        return response()->json(['liked' => $liked, 'likeCount' => $likeCount]);
    }

}
