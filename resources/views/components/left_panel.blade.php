<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="/storage/image/{{Auth::user()->getActualProfileImage()}}" style="width:40px; border-radius:15px"/>&nbsp
            <span><a href="/pages/{{Auth::user()->id}}/profile">{{Auth::user()->getFullName()}}</a></span>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-condensed">
                <tr>
                    <td><span style="font-size: 14px;" class="material-icons">line_weight</span> <a href="/pages/home">News Feed</a></td>
                </tr>
                <tr>
                    <td><span style="font-size: 14px;" class="material-icons">collections</span> <a href="/pages/album">Album</a></td>
                </tr>
                <tr>
                    <td><span style="font-size: 14px;" class="material-icons">people</span> <a href="/pages/friends">Friends</a></td>
                </tr>
                <tr>
                    <td><span style="font-size: 14px;" class="material-icons">people_outline</span> <a href="/pages/users">Users</a></td>
                </tr>
                <tr>
                    <td><span style="font-size: 14px;" class="material-icons">settings</span> <a href="/pages/edit_user">Settings</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
