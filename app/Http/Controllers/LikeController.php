<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request, Post $post)
    {
        $user = $request->user();

        if ($post->likedByUser($user)) {
            $post->likes()->where('user_id', $user->id)->delete();
            $liked = false;
        } else {
            $post->likes()->create(['user_id' => $user->id]);
            $liked = true;
        }

        $likeCount = $post->likes()->count();

        return response()->json(['liked' => $liked, 'likeCount' => $likeCount]);
    }

    public function unlike(Request $request, Post $post)
    {
        $user = $request->user();

        $like = $post->likes()->where('user_id', $user->id)->first();
        if ($like) {
            $like->delete();
        }

        $likeCount = $post->likes()->count();

        return response()->json(['liked' => false, 'likeCount' => $likeCount]);
    }
}
