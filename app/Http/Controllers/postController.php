<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\post;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class postController{

  public function showPostCratePage(){
    return view('/create_post');
  }

  public function userPost(){
    $user = Auth::user();
    $user =  User::find($user->id);
    $posts = post::where('user_id',"=", $user->id)->simplePaginate(10);
    $name = $user->name;
    $profie_image_id = $user->profie_image_id;
    $profie_image_name = $user->profie_image_name;
    return view('/post' ,compact('name','posts','profie_image_id','profie_image_name'));
  }

    public function createPost(Request $request){
      $post_title = $request->input('title');
      $post_content = $request->input('content');
      $user = Auth::user();
      $name = $user->name;
      $post = DB::table('post')->insert([
        'title'=> $post_title,
        'author'=> $user->name,
        'email' => $user->email,
        'content'=> $post_content,
        'user_id'=> $user->id
      ]);
        return back();
    }

    public function editPost(Request $request){
      $postId = $request->route('id');

      return view('/edit_post' ,compact('postId'));
    }

    public function updatePost(Request $request){
      $postId = $request->route('id');
      $user = Auth::user();
      $post_title = $request->input('title');
      $post_content = $request->input('content');
      $post_title = $request->input('title');
      $post_content = $request->input('content');
      DB::table('post')
      ->where('id',$postId)
      ->update([
        'title'=> $post_title,
        'author'=> $user->name,
        'email' => $user->email,
        'content'=> $post_content,
        'user_id'=> $user->id
      ]);
       return back();
    }

    public function deletePost(Request $request){
      $postId = $request->route('id');
      $deltePost = DB::table('post')->where('id', '=', $postId)->delete();
      return back();
    }
  }
