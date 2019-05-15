<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfileImage;
use App\CoverImages;

class ImagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function createCoverImage($request){
        $fullFilename = $request->file('cover')->getClientOriginalName();
        $prefixFilename = pathinfo($fullFilename, PATHINFO_FILENAME);
        $extension = $request->file('cover')->getClientOriginalExtension();
        $filename = $prefixFilename.'_'.time().'.'.$extension;

        $image = new CoverImages();
        $image->filename = $filename;
        $image->user_id = Auth()->user()->id;
        $image->active = true;
        $image->save();
        $path = $request->file('cover')->storeAs('public/image', $filename);
    }

    public function updateCoverImage(Request $request, $id){
        $this->validate($request, ['cover' => 'required|image|max:1999']);

        $oldImage = Auth()->user()->coverImages()->where('active', 1)->first();
        if($oldImage){
            $oldImage->active = false;
            $oldImage->save();
        }

        $this->createCoverImage($request);
        return redirect("/pages/{$id}/profile");
    }

    public function createProfileImage($request, $id){
        $image = new ProfileImage();
        $image->filename = $request->file('image')->getClientOriginalName();
        $image->user_id = Auth()->user()->id;
        $image->active = true;
        $image->save();
        $path = $request->file('image')->storeAs('public/image', $request->file('image')->getClientOriginalName());
    }

    public function updateProfileImage(Request $request, $id){

        $this->validate($request, ['image' => 'required|image|max:1999']);

        $oldImage = Auth()->user()->profileImages()->where('active', 1)->first();
        if($oldImage){
            $oldImage->active = false;
            $oldImage->save();
        }

        $this->createProfileImage($request, $id);
        return redirect("/pages/{$id}/profile");
    }

    public function destroy($image)
    {
        if(file_exists($image)){unlink($image);}
        return redirect(URL()->previous());
    }

}
