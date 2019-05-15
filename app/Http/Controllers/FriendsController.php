<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
use App\FriendRequest;

class FriendsController extends Controller
{

    public function acceptDecline(Request $request){
        $value = $request->input('btn');

        if($value == 'Accept'){return $this->store($request);}
        else{
            $friendRequest = FriendRequest::find($request->input('request_id'));
            $friendRequest->destroy($friendRequest->id);
            return redirect(URL()->previous());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'friend_id' => 'required',
        ]);

        $friend = new Friend();
        $friend->friend_id = $request->input('friend_id');
        $friend->user_id = $request->input('user_id');
        $friend->save();

        $friend = new Friend();
        $friend->friend_id = $request->input('user_id');
        $friend->user_id = $request->input('friend_id');
        $friend->save();

        $friendRequest = FriendRequest::find($request->input('request_id'));
        $friendRequest->destroy($friendRequest->id);

        return redirect(URL()->previous());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friends = Friend::where('user_id', $id)
            ->where('friend_id', 1)
            ->orWhere('user_id', 1)
            ->where('friend_id', $id)->get();

        foreach($friends as $friend){
            $friend->delete();
        }
        return redirect(URL()->previous());
    }
}
