<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{   
    public function store(request $request) 
    {   
        $this->validate($request, ['postarea' => 'required']);
        
         $post = new Post;
         $post->postarea = $request->input('postarea');
         $post->user_id = Auth::id();
         $post->save();
         return redirect('/')->with('status', 'Successfully Posted!'); 
        
       //$post = Post::create($request->all());
       //$post->user_id = $request->input('user_id');

    }
}
