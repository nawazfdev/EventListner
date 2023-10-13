<?php

namespace App\Http\Controllers;

use App\Events\PostEvent;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCont extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $user_id,
        ]);
        
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $user_id,
        ];
        
event(new PostEvent($data));
        return back()->with('success', 'Post created successfully.');

    }
}


 