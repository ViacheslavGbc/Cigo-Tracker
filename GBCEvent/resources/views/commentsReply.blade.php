

@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="/comments/store">
            @csrf
            <div class="form-group">
                <input type="text" name="message" class="form-control" />
                <input type="hidden" name="event_id" value="{{ $event_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Reply" />
            </div>
        </form>
        @include('commentsReply', ['comments' => $comment->replies])
    </div>
@endforeach