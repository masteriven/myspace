<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\video;

class videosController{


    public function showAllVideos(){
      $user = Auth::user();
      $videos = video::where('user_id',"=", $user->id)->simplePaginate(8);
      $profie_image_id = $user->profie_image_id;
      $profie_image_name = $user->profie_image_name;
      return view('/videos',compact('videos','user','profie_image_id','profie_image_name'));
    }
    public function saveVideo(Request $request){
      $user = Auth::user();
      $videoUrlInput = $request->input('import_video');
      $video = DB::table('videos')->insert([
        'video_url'=> $videoUrlInput,
        'user_id' => $user->id
      ]);
      return back();
    }

    public function deleteVideo(Request $request){
      $videoId = $request->route('id');
      $deltePost = DB::table('videos')->where('id', '=', $videoId)->delete();
      return back();
    }
}
