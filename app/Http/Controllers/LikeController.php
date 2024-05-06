<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function like(Request $request, Post $post)
    {
        $like = $post->likes()->firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        return response()->json(['liked' => true, 'buttonText' => 'Unlike']);
    }

    public function unlike(Request $request, Post $post)
    {
        $like = $post->likes()->where('user_id', auth()->id())->first();
        if ($like) {
            $like->delete();
        }

        return response()->json(['liked' => false, 'buttonText' => 'Like']);
    }



}
