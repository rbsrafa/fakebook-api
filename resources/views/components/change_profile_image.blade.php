<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Profile Image</h4>
        </div>
        {{Form::open(['method' => 'PUT', 'action' => ['ImagesController@updateProfileImage', Auth::user()->id], 'enctype' => 'multipart/form-data'])}}
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        @foreach(Auth::user()->profileImages as $images)
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <img style="width:100%; height:50px" src="/storage/image/{{$images->filename}}" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Choose new image', ['class' => 'btn btn-default'])}}
                    {{Form::file('image', ['style' => 'opacity:0; position:absolute; z-index:-1;'])}}
                </div>
            </div>
            <div class="panel-footer">
                {{Form::submit('Update', ['class' => 'btn btn-warning'])}}
            </div>
        {{Form::close()}}
    </div>
</div>
