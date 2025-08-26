<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function showProfile($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $posts = Post::where('user_id', $user->id)->latest()->get();
        return view('profile.profile', compact('user', 'posts'));
    }
}


