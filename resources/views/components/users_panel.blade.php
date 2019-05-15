@include('components.messages')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="/storage/image/{{Auth::user()->find($data['profile_id'])->getActualProfileImage()}}" style="width:40px; border-radius:15px"/>&nbsp
            <span><a href="/pages/{{$data['profile_id']}}/profile">{{Auth::user()->find($data['profile_id'])->getFullName()}}</a></span>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-condensed">
                <tr>

                    <td>
                        {{Form::open(['method' => 'POST', 'action' => 'FriendRequestsController@store'])}}

                            {{Form::text('user_id', $data['profile_id'], ['hidden'])}}
                            {{Form::text('friend_id', Auth::user()->id, ['hidden'])}}
                            <button class="btn btn-sm btn-default" name="add" type="submit">
                                <span style="font-size: 14px;" class="material-icons">person_add</span>
                                 Add friend
                             </button>

                        {{Form::close()}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
{{-- <td><span style="font-size: 14px;" class="material-icons">person_add</span> <a href="/pages/home">Add Friend</a></td> --}}
