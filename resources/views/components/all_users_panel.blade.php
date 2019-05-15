<div class="panel panel-default">
    <div class="panel-body">
        @if(count($data['users']) > 0)
            @foreach($data['users'] as $user)
                <div class="jumbotron col-xs-12 col-sm-5" style="margin-right:10px; background-color: #f5f5f5;">
                    <img style="width:10vh; border-radius:15px;" src="/storage/image/{{$user->getActualProfileImage()}}" />
                    &nbsp<span><a href="/pages/{{$user->id}}/profile">{{$user->getFullName()}}</a></span>
                </div>
            @endforeach
        @else
            Sorry, no users found with this name.
        @endif
    </div>
</div>
