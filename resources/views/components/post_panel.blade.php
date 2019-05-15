<div class="panel panel-default">
    <div class="panel-heading">
        <img src="/storage/image/{{$post->user->getActualProfileImage()}}" style="width:40px; border-radius:15px"/>&nbsp
        <span><a href="/pages/{{$post->user->id}}/profile">{{$post->user->getFullName()}}</a></span>
        <small>- {{$post->description}}</small>
        <small> on {{substr($post->created_at, 0, 10)}}</small>
        <small>at {{substr($post->created_at, -8, 8)}}</small>
    </div>

    <div class="panel-body">
        <span>{{$post->body}}</span>
        @if($post->filename != 'noImage_1518558542.jpeg')
            <span><img style="width:100%" src="/storage/image/{{$post->filename}}" /></span>
        @endif
    </div>

    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                @include('components.like_engine')
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                @if(Auth::user()->id == $post->user_id)
                    {{Form::open(['method' => 'GET', 'action' => ['PagesController@editPost', $post->id]])}}
                        {{Form::submit('Edit', ['class' => 'btn btn-warning btn-xs', 'onclick' => 'return areYouSure()'])}}
                    {{Form::close()}}
                @endif
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                @if(Auth::user()->id == $post->user_id)
                    {{Form::open(['method' => 'DELETE', 'action' => ['PostsController@destroy', $post->id]])}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-xs', 'onclick' => 'return areYouSure()'])}}
                    {{Form::close()}}
                @endif
            </div>
        </div>
        <hr />
        <div class="row">
            @include('components.comments_engine')

        </div>
    </div>
</div>
