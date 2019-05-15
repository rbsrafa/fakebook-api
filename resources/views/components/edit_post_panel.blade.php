<div class="panel panel-default">
    {{Form::open(['method' => 'PUT', 'action' => ['PostsController@update', $post->id]])}}
    <div class="panel-heading">
        <img src="/storage/image/{{$post->user->getActualProfileImage()}}" style="width:40px; border-radius:15px"/>&nbsp
        <span><a href="/pages/{{$post->user->id}}/profile">{{$post->user->getFullName()}}</a></span>


            {{Form::text('description', $post->description, ['class' => 'form-control'])}}
            <small> on {{substr($post->created_at, 0, 10)}}</small>
            <small>at {{substr($post->created_at, -8, 8)}}</small>
    </div>

    <div class="panel-body">
        {{Form::textArea('body', $post->body, ['class' => 'form-control', 'rows' => '3'])}}
        @if($post->filename != 'noImage_1518558542.jpeg')
            <span><img style="width:100%" src="/storage/image/{{$post->filename}}" /></span>
        @endif
    </div>

    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                {{Form::submit('Update', ['class' => 'btn btn-success btn-xs'])}}
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">

            </div>
        </div>
        <hr />
    </div>
    {{Form::close()}}
</div>
