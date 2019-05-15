<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Edit User</h3>
        </div>
        {{Form::open(['method' => 'PUT', 'action' => ['UsersController@update', Auth::user()->id]])}}
            <div class="panel-body">
                    <div class="form-group">
                        {{Form::label('f_name', 'First Name')}}
                        {{Form::text('f_name', Auth::user()->f_name, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('l_name', 'Last Name')}}
                        {{Form::text('l_name', Auth::user()->l_name, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label for="gender" >Gender</label>
                        <div class="form-control">
                            <label class="col-md-4 control-label"><input type="radio" name="gender" value="male">Male</label>
                            <label class="col-md-4 control-label"><input type="radio" name="gender" value="female">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('DOB', 'DOB')}}
                        <input name="DOB" type="date" class="form-control" value="{{Auth::user()->DOB}}"/>
                    </div>
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', Auth::user()->email, ['class' => 'form-control'])}}
                    </div>
            </div>
            <div class="panel-footer">
                {{Form::submit('Update', ['class' => 'btn btn-warning'])}}
            </div>
        {{Form::close()}}
    </div>
</div>
