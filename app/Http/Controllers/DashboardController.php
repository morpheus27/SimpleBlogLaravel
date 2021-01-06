<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['dashboard']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {   
        $comments = Comment::with('posts')->orderBy('created_at', 'desc')->get();
        //$posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(5);
        //return view('dashboard')->with('posts', $posts)->with('comments',$comments);
        return view('dashboard', ['posts'=>$posts, 'comments'=> $comments]);
       
    }
}
