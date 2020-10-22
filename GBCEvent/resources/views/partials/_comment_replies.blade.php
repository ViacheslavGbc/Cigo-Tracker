

@foreach($comments as $comment)
  @if ($comment->status_enabled > 0)
    
        @if($comment->parent_id != null) 
           <div class="display-comment" style="margin-left:40px;">
        @else
           <div class="display-comment">
        @endif
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->message }}</p>
        <a href="" id="reply"></a>




        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="message" class="form-control" required/>
                <input type="hidden" name="event_id" value="{{ $event_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                <input type="submit" class="btn btn-outline-success" value="Reply" />
            </div>

        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
  @endif    
@endforeach