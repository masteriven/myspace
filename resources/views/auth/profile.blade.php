<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile Page - {{$name}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/profile.css">
      <link rel="stylesheet" href="/css/header.css">
    <script src="/js/app.js"></script>
    <script src="/js/editButtonClicked.js"></script>
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
  <section class="profile-content" style="background-color:#f2f2f2;">
    <div class="row">
      <div class="col-4">
      </div>
      <div class="profile col-3">
        <h5 class="nameH5" style="margin-top:80px">Name: {{$name}}</h5><Button id = "edit" onclick="nameEditButtonClicked()">Edit</Button>
        <form action="/edit" method="POST">
          @csrf
          @method('PUT')
        <input type="hidden" name ="status_Id" value="{{$name}}">
        <input type="text" id = "inputName" name='name' value="{{$name}}" placeholder="{{$name}}" style="display:none"></input>
        <button type="submit" id = "buttonDone" value="Submit" style="display:none">Done</button>
        <a href="" id = "buttonClose" style="display:none">Close</a>
      </form>
      <h5>UserName: {{$userName}}</h5><Button id = "edit" onclick="UserNameEditButtonClicked()">Edit</Button>
      <form action="/edit" method="POST">
        @csrf
        @method('PUT')
      <input type="hidden" name ="status_Id" value="{{$userName}}">
      <input type="text" id = "inputUserName" name='userName' value="{{$userName}}" placeholder="{{$userName}}" style="display:none"></input>
      <button type="submit" id = "buttonDoneUserName" value="Submit" style="display:none">Done</button>
      <a href="" id = "buttonCloseUserName" style="display:none">Close</a>
    </form>
        <h5>Age: {{$age}}</h5><Button id = "edit" onclick="AgeEditButtonClicked()">Edit</Button>
        <form action="/edit" method="POST">
          @csrf
          @method('PUT')
        <input type="hidden" name ="status_Id" value="{{$age}}">
        <input type="text" id = "inputAge" name='age' value="{{$age}}" placeholder="{{$age}}" style="display:none"></input>
        <button type="submit" id = "buttonDoneAge" value="Submit" style="display:none">Done</button>
        <a href="" id = "buttonCloseAge" style="display:none">Close</a>
      </form>
      </div>
      <div class="profile col-">
        <h5 class="nameH5" style="margin-top:80px">Town: {{$town}}</h5><Button id = "edit" onclick="TownEditButtonClicked()">Edit</Button>
        <form action="/edit" method="POST">
          @csrf
          @method('PUT')
        <input type="hidden" name ="status_Id" value="{{$town}}">
        <input type="text" id = "inputTown" name='town' value="{{$town}}" placeholder="{{$town}}" style="display:none"></input>
        <button type="submit" id = "buttonDoneTown" value="Submit" style="display:none">Done</button>
        <a href="" id = "buttonCloseTown" style="display:none">Close</a>
      </form>
        <h5 class="email">Email: {{$email}}</h5>
        <h5>PhoneNumber: {{$phone}}</h5><Button id = "edit" onclick="PhoneNumberEditButtonClicked()">Edit</Button>
        <form action="/edit" method="POST">
          @csrf
          @method('PUT')
        <input type="hidden" name ="status_Id" value="{{$phone}}">
        <input type="text" id = "inputPhoneNumber" name='phone' value="{{$phone}}" placeholder="{{$phone}}" style="display:none"></input>
        <button type="submit" id = "buttonDonePhoneNumber" value="Submit" style="display:none">Done</button>
        <a href="" id = "buttonClosePhoneNumber" style="display:none">Close</a>
      </form>
        <h5>Website: {{$website}}</h5><Button id = "edit" onclick="WebsiteEditButtonClicked()">Edit</Button>
        <form action="/edit" method="POST">
          @csrf
          @method('PUT')
        <input type="hidden" name ="status_Id" value="{{$website}}">
        <input type="text" id = "inputWebsite" name='website' value="{{$website}}" placeholder="{{$website}}" style="display:none"></input>
        <button type="submit" id = "buttonDoneWebsite" value="Submit" style="display:none">Done</button>
        <a href="" id = "buttonCloseWebsite" style="display:none">Close</a>
      </form>
      </div>
      <div class="col-3">
      </div>
    </div>
  </div>
</body>
</html>
