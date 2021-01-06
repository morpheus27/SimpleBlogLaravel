@extends('layouts.app')

@section('titlePage', 'Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('messages')
            @if(Auth::user())
            <div class="card">
                <div class="card-body">
                    <form action="{{url('posts')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="postTextArea">Post Message</label>
                            <textarea class="form-control" id="postTextArea" name="postarea" rows="3"
                            placeholder="What's on your mind? {{Auth::user()->name}}"></textarea>
                        </div>
                            <button type="submit" class="btn btn-primary float-right">Post</button>
                    </form>
                </div>
            </div>
            @endif
            <div class="card mt-3" id="post-title">{{ __('LATEST POST') }}</div>
            @if(count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="card mt-2 mb-2" id="post-container">
                        <div class="card-body">
                            <div class="d-inline-flex mb-4">
                                @if ($post->user->profile_image)
                                    <img class="img-profile"  src="profile-images/{{$post->user->profile_image}}">
                                @else 
                                    <img class="img-profile"  src="profile-images/default.png">
                                @endif
                                <p class="post-name">{{$post->user->name}}</p>
                                <p class="post-email">{{$post->user->email}}</p>
                            </div>
                            <div class="post_message-container">
                                <h3>{{$post->postarea}}</h3>
                                <small>Posted at {{$post->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="container comment mt-3">
                                @include('comments')
                            </div>
                            <div class="container mt-2">
                                <form action="{{url('comments')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$post->id}}" name="postid">
                                    <textarea class="form-control" id="commentArea" name="commentarea" rows="3"
                                    placeholder="Write a comment...">
                                    </textarea>
                                    <button class="btn btn-primary float-right mt-3">Reply</button>
                                </form>
                            </div>         
                        </div> 
                    </div>   
                 @endforeach
                 {{$posts->links('pagination::bootstrap-4')}}
            @else
            <div class="card mt-3">
                <div class="card-body">
                    <h3>No Posts Found!</h3>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

