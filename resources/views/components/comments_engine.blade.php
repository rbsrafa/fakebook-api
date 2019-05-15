<div class="col-md-12">
    <div class="panel panel-default">
        {{Form::open(['method' => 'POST', 'action' => 'CommentsController@deleteOrStore'])}}
            <div class="panel-body" style="background-color:#f5f5f5">
                @if(count($post->comments) > 0)
                    @foreach($post->comments as $comment)
                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <img style="width:30px; border-radius:15px;" src="/storage/image/{{$comment->user->getActualProfileImage()}}" />
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="jumbotron">
                                    <span style="margin-left:5px">{{$comment->text}}</span>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                @if(Auth::user()->id == $comment->user->id)
                                    <button name="btn" value="{{$comment->id}}" type="submit" class="btn btn-default btn-xs"><span style="font-size: 20px;" class="material-icons">delete_forever</span></button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Be the first to comment!</p>
                @endif
            </div>

            <div class="panel-footer" style="padding-left:0px">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <img style="width:35px; border-radius:15px;" src="/storage/image/{{Auth::user()->getActualProfileImage()}}" />
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        {{Form::textArea('text', '', ['class' => 'form-control', 'placeholder' => 'Say something about it.', 'rows' => '1'])}}
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        {{Form::text('post_id', $post->id, ['hidden'])}}
                        {{Form::text('user_id', Auth::user()->id, ['hidden'])}}
                        {{Form::submit('Comment', ['name' => 'btn', 'class' => 'btn btn-primary btn-sm'])}}
                    </div>
                </div>
            </div>
        {{Form::close()}}
    </div>
</div>
