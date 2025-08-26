<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function __construct()
    {

    }

    public function showUserHome($username)
    {
        if (auth()->user()->username !== $username) {
            abort(403, 'Unauthorized access.');
        }

        $posts = Post::with(['user', 'files'])->whereNot('user_id', auth()->user()->id)->inRandomOrder()->get();

        return view('welcome', [
            'user' => auth()->user(),
            'posts' => $posts
        ]);
    }

}
