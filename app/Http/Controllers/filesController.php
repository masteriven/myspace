<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use App\Models\files;
use Illuminate\Support\Facades\DB;


class filesController{


  public function uploadFile(Request $request){
   $user = Auth::user();
    $file = $request->file('file');
    $fileName = $request->input('fileName');
    $fileNameTrim  = substr($fileName,0,10);
    $fileContent = $request->file;
    $files = Storage::disk('local')->put('file', $fileContent);
    $getFileFromStorage = Storage::get($files);
    $convertTobase64 = base64_encode($getFileFromStorage);
     Storage::delete($file);
    $response = Http::attach('file',file_get_contents($fileContent), $files
    )->post('https://pixeldra.in/api/file');
    $a = $response->json();
    $b = json_encode($a);
    $c = json_decode($b,true);
    $arraytoSTring = json_encode( $c['id']);
    $arraytoSTringwitoutquote = trim($arraytoSTring,'"');
    DB::table('files')->insert([
    'fileName' => $fileNameTrim,
     'url_download' => $arraytoSTringwitoutquote,
     'user_id' => $user->id,
   ]);
   return back();
}

public function showDownloadLink(Request $request){
  $user = Auth::user();
  $file = $request->file('file');
  $downloadLinks = files::where('user_id',"=", $user->id)->simplePaginate(8);
  $profie_image_id = $user->profie_image_id;
  $profie_image_name = $user->profie_image_name;
  return view('/uploadFiles',compact('downloadLinks','user','profie_image_id','profie_image_name'));
}

  public function searchFile(Request $request){
    $user = Auth::user();
    $fileSearch = $request->input('fileSearch');
    $searchResults = DB::table('files')->pluck('fileName');
    $downloadLinks = DB::table('files')->pluck('url_download');
    $file = $request->file('file');
    $download = '';
    foreach($downloadLinks as $downloadLink){
      // echo $downloadLinks;
      foreach($searchResults as $keys=>$searchResult){
      if($searchResult == $fileSearch){
        $download = $downloadLinks[$keys];
        return view('/getFileSearch',compact('fileSearch','download'));

    }
  }

}
    $fileSearch = "No Result";
    return view('/getFileSearch',compact('fileSearch','download'));
}
}
