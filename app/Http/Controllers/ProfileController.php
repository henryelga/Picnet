<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts;
        return view('profile', compact('user', 'posts'));
    }

    /**
     * Display the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function showProfile()
    {
        $user = Auth::user();
        return view('editprofile', compact('user'));
    }



    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'bio' => 'nullable|string',
            'pfp' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('pfp')) {
            $pfpPath = $request->file('pfp')->store('profiles', 'public');
            $user->pfp = $pfpPath;
        }

        // $user->update($validated);
        $user->username = $validated['username'];
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->bio = $validated['bio'];
        $user->save();

        // Fetch the updated user information
        $user = $user->fresh();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }




}
