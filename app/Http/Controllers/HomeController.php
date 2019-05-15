<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
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

}
