<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\FriendRequest;

class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function profile($id){
        $profile_img = User::find($id)->getActualProfileImage();
        $cover_img = User::find($id)->getActualCoverImage();
        $username = User::find($id)->getFullName();
        $posts = User::find($id)->getUserPosts();

        $i =[];
        foreach($posts as $post){
            foreach($post->likes()->orderBy('created_at', 'desc')->limit(3)->get() as $likes){
                array_push($i, $likes->user->getActualProfileImage());
            }
        }

        $data = [
            'profile_id' => $id,
            'profile_img' => $profile_img,
            'cover_img' => $cover_img,
            'username' => $username,
            'posts' => $posts,
        ];
        return view("pages/profile")->with('data', $data);
    }

    public function home(){
        $profile_img = Auth()->user()->getActualProfileImage();
        $cover_img = Auth()->user()->getActualCoverImage();
        $username = Auth()->user()->getFullName();
        $posts = Post::orderBy('created_at', 'desc')->get();
        $data = [
            'profile_img' => $profile_img,
            'cover_img' => $cover_img,
            'username' => $username,
            'posts' => $posts
        ];
        return view('pages.home')->with('data', $data);
    }

    public function album(){
        $profile_img = Auth()->user()->getActualProfileImage();
        $cover_img = Auth()->user()->getActualCoverImage();
        $username = Auth()->user()->getFullName();
        $profileImages = Auth()->user()->profileImages;
        $coverImages = Auth()->user()->coverImages;
        $postImages = Auth()->user()->posts;
        $images = [
            'profile' => $profileImages,
            'cover' => $coverImages,
            'timeline' => $postImages,
        ];

        $data = [
            'profile_img' => $profile_img,
            'cover_img' => $cover_img,
            'username' => $username,
            'images' => $images
        ];

        return view('pages.album')->with('data', $data);
    }

    public function friends(){
        $profile_img = Auth()->user()->getActualProfileImage();
        $cover_img = Auth()->user()->getActualCoverImage();
        $username = Auth()->user()->getFullName();
        $friends = Auth()->user()->getFriends();
        $requests = Auth()->user()->getFriendRequests();

        $data = [
            'profile_img' => $profile_img,
            'cover_img' => $cover_img,
            'username' => $username,
            'users' => $friends,
            'requests' => $requests
        ];
        return view('pages.friends')->with('data', $data);
    }

    public function friendsRequest(){
        $profile_img = Auth()->user()->getActualProfileImage();
        $cover_img = Auth()->user()->getActualCoverImage();
        $username = Auth()->user()->getFullName();
        $friends = Auth()->user()->getFriendRequests();

        $data = [
            'profile_img' => $profile_img,
            'cover_img' => $cover_img,
            'username' => $username,
            'users' => $friends
        ];
        return view('pages.friends_request')->with('data', $data);
    }

    public function editUser(){
        $profile_img = Auth()->user()->getActualProfileImage();
        $cover_img = Auth()->user()->getActualCoverImage();
        $username = Auth()->user()->getFullName();
        $data = [
            'profile_img' => $profile_img,
            'cover_img' => $cover_img,
            'username' => $username
        ];
        return view('pages.edit_user')->with('data', $data);
    }

    public function editPost($id){
        $post = Post::find($id);
        return view('pages.edit_post')->with('post', $post);
    }

    public function profileImage(){
        $profile_img = Auth()->user()->getActualProfileImage();
        $cover_img = Auth()->user()->getActualCoverImage();
        $username = Auth()->user()->getFullName();
        $data = [
            'profile_img' => $profile_img,
            'cover_img' => $cover_img,
            'username' => $username
        ];
        return view('pages.profile_image')->with('data', $data);
    }

    public function coverImage(){
        $profile_img = Auth()->user()->getActualProfileImage();
        $cover_img = Auth()->user()->getActualCoverImage();
        $username = Auth()->user()->getFullName();
        $data = [
            'profile_img' => $profile_img,
            'cover_img' => $cover_img,
            'username' => $username
        ];
        return view('pages.cover_image')->with('data', $data);
    }

    public function users(){
        $users = User::all();
        $data =[
            'users' => $users
        ];
        return view('pages.users')->with('data', $data);
    }

    public function search(Request $request){
        $value = $request->input('username');
        $users = User::where('f_name', 'Like', '%'."$value".'%')
            ->orWhere('l_name', 'Like', '%'."$value".'%')
            ->get();

        $data = [
            'users' => $users,
        ];
        return view('pages.users')->with('data', $data);
    }

    public function ajaxTest(){
        $user = User::find(1);
        return view('pages.ajax_test')->with('user', $user);
    }
}
