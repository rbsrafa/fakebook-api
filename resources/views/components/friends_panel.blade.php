<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Friends</h3>
        <a href="/pages/friends_request" class="btn btn-sm btn-success">Friend Requests <span class="badge" style="background-color: #fff; color:black">{{count($data['requests'])}}</span></a>
    </div>
    <div class="panel-body">
        @if(count($data['users']) > 0)
            @foreach($data['users'] as $user)
                <div class="jumbotron col-xs-12 col-sm-5 col-md-5" style="margin-right:10px; background-color: #f5f5f5;">
                    <img style="width:10vh; border-radius:15px;" src="/storage/image/{{$user->getActualProfileImage()}}" />
                    &nbsp<span><a href="/pages/{{$user->id}}/profile">{{$user->getFullName()}}</a></span>&nbsp &nbsp

                    {{Form::open(['method' => 'DELETE', 'action' => ['FriendsController@destroy', $user->id]])}}


                        {{Form::submit('Unfriend', ['class' => 'btn btn-xs btn-default'])}}</span>
                    {{Form::close()}}
                </div>
            @endforeach
        @else
            Sorry, no users found.
        @endif
    </div>
</div>
