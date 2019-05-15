<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function deleteOrStore(Request $request){
        $value = $request->input('btn');

        if($value == 'Comment'){
            return $this->store($request);

        }else{
            $id = $request->input('btn');
            return $this->destroy($id);
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
            'post_id' => 'required',
            'text' => 'required'
        ]);

        $comment = new Comment();
        $comment->user_id = $request->input('user_id');
        $comment->post_id = $request->input('post_id');
        $comment->text = $request->input('text');
        $comment->save();

        return redirect(URL()->previous());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect(URL()->previous());
    }
}
