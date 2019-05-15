<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use App\User;

class LikesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function likeUnlike(Request $request){

        $value = $request->input('value');

        if($value == 'unlike'){
            $id = [
                'user' => $request->input('user_id'),
                'post' => $request->input('post_id')
            ];
            return $this->destroy($id);
        }else{
            return $this->store($request);
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
            'post_id' => 'required'
        ]);

        $like = new Like();
        $like->user_id = $request->input('user_id');
        $like->post_id = $request->input('post_id');
        $like->save();

        $amount = count(Post::find($request->input('post_id'))->likes);

        $likes = Like::where('post_id', $request->input('post_id'))->get();
        $users = [];
        foreach($likes as $like){
            array_push($users, $like->user_id);
        }
        $images = [];
        foreach($users as $user){
            array_push($images, User::find($user)->getActualProfileImage());
        }

        return response()->json(['amount' => $amount, 'images' => $images]);
        //return redirect("pages/home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $like = Like::where([
            ['user_id', $id['user']],
            ['post_id', $id['post']],
        ])->first();

        $like->delete();

        $amount = count(Post::find($id['post'])->likes);
        $likes = Like::where('post_id', $id['post'])->get();
        $users = [];
        foreach($likes as $like){
            array_push($users, $like->user_id);
        }
        $images = [];
        foreach($users as $user){
            array_push($images, User::find($user)->getActualProfileImage());
        }

        return response()->json(['amount' => $amount, 'images' => $images]);
        //return redirect('pages/home');
    }
}
