<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Traits\PostTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use PostTrait;

    public function index(){
        $postsFromDB = Post::all();
        return view('posts.index',['posts'=>$postsFromDB]);
    }

    public function create(){
        $allUsers = User::all();
        return view('posts.create',['users'=>$allUsers]);
    }

    public function store(PostRequest $request){

        $photo = $this->saveImage($request->photo , 'images/posts');

        $title = $request->title ;
        $description = $request->description;
        $user_id = $request->user_id;

        Post::create([
            'title'         =>$title,
            'description'   =>$description,
            'user_id'       =>$user_id,
            'photo'         =>$photo,
        ]);
        return redirect()->route('posts.index')->with(['message'=>'one record created']);
    }

    public function show($post){
        $singlePost = Post::where('id',$post)->first();
        if($singlePost){
            return view('posts.show',['post'=>$singlePost]);
        }else{
            return redirect()->route('posts.index')->with(['message'=>'there is no record']);
        }
    }

    public function edit($post){
        $editPost = Post::where('id',$post)->first();
        $allUsers = User::all();
        if($editPost){
            return view('posts.edit',['post'=>$editPost , 'users'=>$allUsers]);
        }else{
            return redirect()->route('posts.index')->with(['message'=>'there is no record']);
        }
    }

    public function update($post , PostRequest $request){
        $photo = $this->saveImage($request->photo , 'images/posts');

        $title          = $request->title;
        $description    = $request->description;
        $user_id        = $request->user_id;

        $singleUpdate = Post::findOrFail($post);
        $singleUpdate->update([
            'title'         =>$title,
            'description'   =>$description,
            'user_id'       =>$user_id,
            'photo'         =>$photo,
        ]);
        return redirect()->route('posts.index')->with(['message'=>'one record updated']);
    }

    public function destroy($post){
        $singleDelete = Post::findOrFail($post);
        if($singleDelete) {
            $singleDelete->Delete();
            return redirect()->route('posts.index')->with(['message'=>'one record deleted']);
        }
            return redirect()->route('posts.index')->with(['message'=>'there is no record']);
    }
}
