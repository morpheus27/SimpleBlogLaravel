

@foreach ($comments as $comment)
    <div class="comment_content-container">
        @if($comment->post_id == $post->id)
        <div class="d-inline-flex mt-2">
            @if ($comment->user->profile_image)
                <img class="img-profile_comment"  src="profile-images/{{$comment->user->profile_image}}">
            @else 
                <img class="img-profile_comment"  src="profile-images/default.png">
            @endif
            <p class="post-name_comment">{{$comment->user->name}}</p>
            <p class="post-email_comment">{{$comment->user->email}}</p>
        </div>
        <div class="post_message-container_comment"> 
            <h5>{{$comment->comments}}</h5>
            <small class="comment_date">Posted at {{$comment->created_at->diffForHumans()}}</small>
        </div>
        @endif                               
    </div>
@endforeach 