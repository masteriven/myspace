<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userController
{


    public function userData(){
        $user = Auth::user();
        $userName = $user->email;
        $name = $user->name;
        $email = $user->email;
        $age = $user->Age;
        $phone = $user->Phone;
        $town = $user->Town;
        $website = $user->Website;
        $profie_image_id = $user->profie_image_id;
        $profie_image_name = $user->profie_image_name;
        return view('/profile',compact('user','userName','name','email','age','phone','town','website','profie_image_id','profie_image_name'));
    }

    public function updateUserData(Request $request){
      $user = Auth::user();
      $name = $request->input('name');
      $userName = $request->input('userName');
      $age = $request->input('age');
      $town = $request->input('town');
      $phoneNumber = $request->input('phone');
      $website = $request->input('website');

      if(!empty($name)){
        $userTables = DB::table('users')->get();
        foreach($userTables as $userTable){
          $userTable = DB::table('users')
          ->where('id',1)
          ->update([
            'name' => $name
          ]);
        }

      }else if(!empty($userName)){
        $userTables = DB::table('users')->get();
        foreach($userTables as $userTable){
          $userTable = DB::table('users')
          ->where('id',1)
          ->update([
            'email' => $userName
          ]);
        }
      }
    else if(!empty($age)){
      $userTables = DB::table('users')->get();
      foreach($userTables as $userTable){
        $userTable = DB::table('users')
        ->where('id',1)
        ->update([
          'age' => $age
        ]);
      }
    }
  else if(!empty($town)){
    $userTables = DB::table('users')->get();
    foreach($userTables as $userTable){
      $userTable = DB::table('users')
      ->where('id',1)
      ->update([
        'Town' => $town
      ]);
    }
  }

  else if(!empty($phoneNumber)){
    $userTables = DB::table('users')->get();
    foreach($userTables as $userTable){
      $userTable = DB::table('users')
      ->where('id',1)
      ->update([
        'Phone' => $phoneNumber
      ]);
    }
  }

  else if(!empty($website)){
    $userTables = DB::table('users')->get();
    foreach($userTables as $userTable){
      $userTable = DB::table('users')
      ->where('id',1)
      ->update([
        'Website' => $website
      ]);
    }
  }
      else if(empty($name) || empty($userName)){
        $userTables = DB::table('users')->get();
        foreach($userTables as $userTable){
          $userTable = DB::table('users')
          ->where('id',1)
          ->update([
            'name' => $user->name,
            'email'=> $user->email
          ]);
        }
      }
      return back();
    }
}
