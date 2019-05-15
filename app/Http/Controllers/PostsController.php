<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'nullable|string|max:191',
            'body' => 'required|string|max:255',
            'user_id' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        //Handle File upload
        if($request->hasFile('image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extention = $request->file('image')->getClientOriginalExtension();
            //Filename to Store
            $filenameToStore = $filename.'_'.time().'.'.$extention;
            //Upload images
            $path = $request->file('image')->storeAs('public/image', $filenameToStore);
        }else{
            $filenameToStore = 'noImage_1518558542.jpeg';
        }

        $post = new Post();
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->user_id = $request->input('user_id');
        $post->filename = $filenameToStore;
        $post->save();

        return redirect('/pages/home');
    }

    public function edit($id)
    {

    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required|string|max:255',
            'description' => 'nullable|string|max:191'
        ]);

        $post = Post::find($id);
        $post->body = $request->input('body');
        $post->description = $request->input('description');
        $post->save();

        return redirect('pages/home');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $imagePath = public_path().'/storage/image/'.$post->filename;


        if(file_exists($imagePath)){unlink($imagePath);}

        $post->delete();
        return redirect(URL()->previous());
    }
}
