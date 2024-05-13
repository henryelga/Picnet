<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->user_id = Auth::id();
        $comment->post_id = $postId;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
        // Check if the authenticated user owns the comment
        if ($comment->user_id === Auth::id()) {
            return view('comments.edit', compact('comment'));
        } else {
            return redirect()->back()->with('error', 'You are not authorized to edit this comment.');
        }
    }

    public function update(Request $request, Comment $comment)
    {
        // Check if the authenticated user owns the comment
        if ($comment->user_id === Auth::id()) {
            $validatedData = $request->validate([
                'content' => 'required|string|max:255',
            ]);

            $comment->update($validatedData);
            return redirect()->back()->with('success', 'Comment updated successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to update this comment.');
        }
    }

    public function destroy(Comment $comment)
    {
        // Check if the authenticated user owns the comment
        if ($comment->user_id === Auth::id() || auth()->user()->isAdmin()) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }
    }
}
