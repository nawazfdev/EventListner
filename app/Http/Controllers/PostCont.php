<?php

namespace App\Http\Controllers;

use App\Events\PostEvent;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Event;
use App\Events\SendMail;
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
        Event::dispatch(new PostEvent($data));
// event(new PostEvent($data));
        return back()->with('success', 'Post created successfully.');

    }


    public function subscribe(Request $request){
        // $userId = $request->input('userId');
Event::dispatch(new SendMail(1));
        dd('email subscribed successfully ');
    }
    public function onetoone(){

        $user = User::find(1)->post; 

        // $email=$user->email;
dd($user);
// dd($email);

    }
    public function onetomany(){

        $user = User::find(1)->post1; 

        // $email=$user->email;
dd($user);
// dd($email);

    }
    public function manytomany(){

        $user = User::find(1)->post; 

        // $email=$user->email;
dd($user);
// dd($email);

    }
 


}


 