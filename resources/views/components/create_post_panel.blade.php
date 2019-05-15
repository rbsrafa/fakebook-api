<div class="row">
    <div class="col-md-12">
        @include('/components/messages')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Create Post</h4>
            </div>
            {{Form::open(['method' => 'POST', 'action' => 'PostsController@store', 'enctype' => 'multipart/form-data'])}}
                <div class="panel-body">
                    {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description (e.g. cooking dinner)'])}}
                    {{Form::textArea('body', '', ['rows' => '3', 'class' => 'form-control', 'placeholder' => 'What`s in your mind?'])}}
                </div>
                <div class="panel-footer">
                    <label for="image" class="btn btn-default btn-xs"><span style="font-size: 14px;" class="material-icons">perm_media</span> Choose image</label>
                    {{Form::file('image', ['style' => 'opacity: 0; position: absolute; z-index: -1;', 'id' => 'image'])}}&nbsp &nbsp
                    {{Form::submit('Post', ['class' => 'btn btn-primary btn-xs'])}}
                    {{Form::text('user_id', Auth::user()->id, ['hidden'])}}
                </div>
            {{Form::close()}}
        </div>
    </div>
</div>
