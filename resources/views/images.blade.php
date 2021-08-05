<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Images Page - {{$user->name}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/images.css">
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/header.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <div class="container">
      <div class="row">
      <div class="menu col-lg col-md col-sm col-6">
      <div class="logo">
        <svg class="w-16 h-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" style = "width:50px; height:50px;">
            <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"></path>
            <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"></path>
        </svg>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a href="/profile"><i class="fas fa-home"></i></a>
            </li>
            <li class="nav-item">
              <a href="/post"><i class="fas fa-pen-square"></i></a>
            </li>
            <li class="nav-item">
              <a href="/videos"><i class="fas fa-film"></i></i></a>
            </li>
            <li class="nav-item">
                <a href="/images"><i class="fas fa-image"></i></a>
            </li>
            <li class="nav-item">
              <a href="/files"><i class="far fa-file"></i></a>
            </li>
          </ul>
        </div>
      </nav>
      </div>
      <div class="col-">
        <div class="profile-image">
            <img src="https://i.ibb.co/{{$profie_image_id}}/{{$profie_image_name}}.jpg" style="width:100px;height:100px;  margin-top:25px; position:relative;"/>
          <form action="/changeProfilePhoto" method="POST" enctype="multipart/form-data" value="filename">
            @method('PUT')
            @csrf
            <div class="input-group mb-3" style = "width: 0px; position:relative; right:-10px; top:-30px;">
            <div class="custom-file">
          <input type="file" name ="filename" class="custom-file-input" id="inputGroupFile02">
          <label class="custom-file-label" for="inputGroupFile02" style = "width: 80px; position:absolute; right:105px; top:-20px; opacity: 0">Choose file</label>
        </div>
          <button type="submit" style = "width: 100px;">Replace</button>
        </div>
      </form>
        <a href="/" style = "display:inline-block; position: relative; top: -40px; margin-left:15px; font-size:18px;">Log out</a>
          </div>
      </div>
      </div>
      </div>
      </div>
    </header>
  <section id="page-layout">
    <div class="row">
      <div class="col-1">
        <div class="left-side-bar">
        </div>
      </div>
        <div class="col-10">
          <div class="images-sources">
            <form action="/importImage" method="POST" enctype="multipart/form-data" value="filename">
              @csrf
              <div class="upload_container">
                <input type="file" id="myFile" name="filename" required="true">
                <button type="submit" value="Upload">Upload</button>
              </div>
            </form>
            <div class="image-preview-container">
              {{$images->links()}}
                <div class="x">
              @foreach ($images as $image)
                <form action="/delete/image/{{$image->id}}" method="POST">
                @method('DELETE')
                @csrf
                <div class="image-container">
                <img src="https://i.ibb.co/{{$image->image_id}}/{{$image->filename}}.jpg">
                <button type="submit" class="deleteButton" style = "background: #f2f2f2"><i class="fas fa-times" style="font-size:15px;"></i></button>
                </div>
            </form>
              @endforeach
            </div>
            </div>
          </div>
      </div>
      <div class="col-1">
      <div class="side-bar">
      </div>
    </div>
    </div>
  </section>
</body>
</html>
