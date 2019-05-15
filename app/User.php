<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //     ATTRIBUTES     //
    protected $fillable = [
        'f_name', 'l_name', 'email', 'password', 'gender', 'DOB'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //     RELATIONSHIPS    //

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function friends(){
        return $this->hasMany('App\Friend');
    }

    public function getFriends(){
        $list = $this->friends;
        $ids = [];
        foreach($list as $l){
            array_push($ids, $l->friend_id);
        }

        $friends = [];
        foreach($ids as $id){
            array_push($friends, User::find($id));
        }

        return $friends;
    }

    public function friendsRequest(){
        return $this->hasMany('App\FriendRequest');
    }

    public function getFriendRequests(){
        $list = $this->friendsRequest;

        $ids = [];
        foreach($list as $l){
            if($l->user_id == Auth()->user()->id){
                array_push($ids, $l->friend_id);
            }
        }

        $requests = [];
        foreach($ids as $id){
            array_push($requests, User::find($id));
        }
        return $requests;
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function profileImages(){
        return $this->hasMany('App\ProfileImage');
    }

    public function coverImages(){
        return $this->hasMany('App\CoverImages');
    }

    //     GETTERS     //

    public function getUserPosts(){
        return $this->posts()->orderBy('created_at', 'desc')->get();
    }

    public function getFullName(){
        return $this->f_name.' '.$this->l_name;
    }

    public function getActualProfileImage(){
        $image = null;
        if($this->profileImages()->where('active', 1)->first() !== null){
            $image = $this->profileImages()->where('active', 1)->first()->filename;
        }else{
            $image = 'noImage_1519074876.jpeg';
        }
        return $image;
    }

    public function getActualCoverImage(){
        $image = null;
        if($this->coverImages()->where('active', 1)->first() !== null){
            $image = $this->coverImages()->where('active', 1)->first()->filename;
        }else{
            $image = 'noImage_1519074876.jpeg';
        }
        return $image;
    }
}
