<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $like = Like::where('user_id', auth()->id())
            ->where('post_id', $post->id)
            ->first();

        if (!$like) {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
            ]);
        }

        return redirect()->back();
    }

    public function unlike(Post $post)
    {
        $like = Like::where('user_id', auth()->id())
            ->where('post_id', $post->id)
            ->first();

        if ($like) {
            $like->delete();
        }

        return redirect()->back();
    }
}
