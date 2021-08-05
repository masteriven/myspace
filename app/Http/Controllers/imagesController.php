<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\image;
use App\Models\User;

class imagesController
{

    public function uploadImage(Request $request){
      $apikey = '5b72c51b45c3220395d89fa67b0e0e0e';
      $id = '';
      $user = Auth::user();
      $imageInput = $request->file('filename');
      $fileContent = $request->filename;
      $file = Storage::disk('local')->put('files', $fileContent);
      $getFileFromStorage = Storage::get($file);
      $convertTobase64 = base64_encode($getFileFromStorage);
      Storage::delete($file);
      $repsonse = Http::asForm()->post('https://api.imgbb.com/1/upload?expiration&key='.$apikey , [
      "image" => $convertTobase64
      ]);

      //fetch image id from response
      $a = (string) $repsonse->getBody();
      $json = json_decode($a);
      $imageId = $json->data->id;
      $fileName = $json->data->title;

      //enter id and user id to the database
       $image = DB::table('images')->insert([
        'image_id' => $imageId,
        'filename' => $fileName,
        'user_id' => $user->id,
      ]);
      return back();
    }

    public function showAllImages(){
      $user = Auth::user();
      $images = image::where('user_id',"=", $user->id)->simplePaginate(8);
      $profie_image_id = $user->profie_image_id;
      $profie_image_name = $user->profie_image_name;
      return view('/images',compact('images','user','profie_image_id','profie_image_name'));
    }


    public function uploadProfileImage(Request $request){
      $apikey = '5b72c51b45c3220395d89fa67b0e0e0e';
      $id = '';
      $user = Auth::user();
      $imageInput = $request->file('filename');
      $fileContent = $request->filename;
      $file = Storage::disk('local')->put('files', $fileContent);
      $getFileFromStorage = Storage::get($file);
      $convertTobase64 = base64_encode($getFileFromStorage);
      Storage::delete($file);
      $repsonse = Http::asForm()->post('https://api.imgbb.com/1/upload?expiration&key='.$apikey , [
      "image" => $convertTobase64
      ]);

      //fetch image id from response
      $a = (string) $repsonse->getBody();
      $json = json_decode($a);
      $imageId = $json->data->id;
      $fileName = $json->data->title;

      //enter id and user id to the database
       $image = DB::table('users')->where('id',$user->id)->update([
        'profie_image_id' => $imageId,
        'profie_image_name' => $fileName,
      ]);
      return back();
    }

    //
    // public function showProfileImage(){
    //   $user = Auth::user();
    //   $imageProfileId = User::where('profie_image_id',"=", $user->profie_image_id);
    //   $imageProfileName = User::where('profie_image_name',"=", $user->profie_image_name);
    //   return view('/header',compact('imageProfileId','imageProfileName'));
    // }


    public function deleteImage(Request $request){
      $imageId = $request->route('id');
      $deltePost = DB::table('images')->where('id', '=', $imageId)->delete();
      return back();
    }
}
