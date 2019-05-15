<div class="panel panel-default">
    <div class="panel-heading">
        <h3>Friendship Requests</h3>
    </div>
    <div class="panel-body">
        @include('components.messages')
        @if(count($data['users']) > 0)
            @foreach($data['users'] as $user)
                <div class="jumbotron col-xs-12 col-sm-5 col-md-5">
                    <div class="jumbotron col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-right:25px; background-color: #f5f5f5;">
                        <img style="width:10vh; border-radius:15px;" src="/storage/image/{{$user->getActualProfileImage()}}" />
                        &nbsp<span><a href="/pages/{{$user->id}}/profile">{{$user->getFullName()}}</a></span>
                        <div class="row">
                            {{Form::open(['method' => 'POST', 'action' => 'FriendsController@acceptDecline'])}}


                                {{Form::text('user_id', Auth::user()->id, ['hidden'])}}
                                {{Form::text('friend_id', $user->id, ['hidden'])}}
                                {{Form::text('request_id', Auth::user()->friendsRequest[0]->id, ['hidden'])}}
                                {{Form::submit('Accept', ['name' => 'btn', 'class' => 'btn btn-xs btn-success'])}}&nbsp &nbsp
                                {{Form::submit('Decline', ['name' => 'btn','class' => 'btn btn-xs btn-danger'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            Sorry, no users found.
        @endif
    </div>
</div>
