<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function edit($id)
    {
        $profile_img = Auth()->user()->getActualProfileImage();
        $cover_img = Auth()->user()->getActualCoverImage();
        $username = Auth()->user()->getFullName();
        $posts = Auth()->user()->getUserPosts();

        $data = [
            'profile_img' => $profile_img,
            'cover_img' => $cover_img,
            'username' => $username,
            'posts' => $posts
        ];

        return view('users.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'gender' => 'required',
            'DOB' => 'required|date',
            'email' => 'required|email|string|max:255'
        ]);

        $user = User::find($id);
        $user->f_name = $request->input('f_name');
        $user->l_name = $request->input('l_name');
        $user->gender = $request->input('gender');
        $user->DOB = $request->input('DOB');
        $user->email = $request->input('email');
        $user->save();

        return redirect('/pages/home')->with('success', 'User successfuly updated!');
    }

    public function destroy($id)
    {
        //
    }
}
