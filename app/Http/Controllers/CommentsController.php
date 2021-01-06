<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(request $request)
    {
        $this->validate($request, ['commentarea' => 'required']);

        if(Auth::user()) {
        $comment = new Comment;
        $comment->comments = $request->input('commentarea');
        $comment->post_id = $request->input('postid');
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect('/')->with('status', 'Comments Successfully!');
        } else {
        return redirect('/login');
        } 
    }
}
