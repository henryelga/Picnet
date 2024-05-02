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
            $pfp = $request->file('pfp')->store('profiles', 'public');
            $validated['pfp'] = $pfp;
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
