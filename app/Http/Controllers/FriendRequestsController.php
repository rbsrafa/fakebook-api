<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FriendRequest;

class FriendRequestsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'friend_id' => 'required',
            'user_id' => 'required',
            'message' => 'string|max:191'
        ]);

        $friendRequest = new FriendRequest();
        $friendRequest->friend_id = $request->input('friend_id');
        $friendRequest->user_id = $request->input('user_id');
        $friendRequest->message = $request->input('message');
        $friendRequest->save();

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
        $friendRequest = FriendRequest::find($id);
        $friendRequest->delete();

        return redirect('pages.friends');
    }
}
