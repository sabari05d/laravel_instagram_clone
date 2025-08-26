<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('user/index', compact('users'));
    }

    public function saveUserData(Request $request)
    {
        // dd($request->all());

        User::create($request->all());
        // return redirect('/');
        return redirect()->route('home')->with([
            'status' => 'success',
            'message' => 'User Created!'
        ]);
    }

    public function updateUserData(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('home')->with([
            'status' => 'success',
            'message' => 'User Updated!'
        ]);
    }

}
