<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostFile;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    //
    public function postIndexPage($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('post.post', compact('user'));
    }

    public function savePost(Request $request)
    {
        $validate = $request->validate([
            'files.*' => 'required|mimes:jpeg,png,jpg,mp4,mov,avi|max:51200', // 50MB per file
            'caption' => 'nullable|string|max:1000',
        ]);

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'caption' => $validate['caption']
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;

                $file->storeAs('uploads/posts', $filename, 'public');

                PostFile::create([
                    'post_id' => $post->id,
                    'file_name' => $filename,
                    'file_type' => $file->getMimeType(), // helpful if you're displaying images/videos
                ]);
            }
        }


        return redirect()->route('user.dashboard', Auth::user()->username)->with('success', 'Post created successfully!');
    }

    public function viewPostOld($username, $postId)
    {
        $user = User::where('username', $username)->firstOrFail();
        $post = Post::with('files')->findOrFail($postId);
        return view('post.view_post', compact('post', 'user'));
    }

    public function viewPost($username, $postId)
    {
        $user = User::where('username', $username)->firstOrFail();

        $post = Post::with('files')
            ->where('id', $postId)
            ->where('user_id', $user->id)
            ->first();

        if (!$post) {
            abort(404, 'Post not found or unauthorized access.');
        }

        if (auth()->id() !== $user->id) {
            abort(403, 'Unauthorized access.');
        }

        return view('post.view_post', compact('post', 'user'));
    }



}
