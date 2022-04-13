<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{url('public/backend/css')}}/login.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
    <style>
      .text-error_register{
          font-size:13px;
          margin-bottom: 10px;
          font-weight: 800;
      }
      .tl_btn-under{
            font-size: 13px;
            color: #fff;
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
        }
        .tl_btn-link{
            color:rgb(69, 153, 255);
            text-decoration: none !important;
            font-weight: 900;
            
        }
        .tl_btn-link:hover{
            color: #5c92d8;
        }
    </style>
  
</head>

<body>
    

<div class="login">



	<h1>Register</h1>
    <form method="post">
    {{ csrf_field() }}
    	<input type="text" name="name" placeholder="User name"  />
        @error('name')
            <div class="text-danger text-error_register">{{ $message }}</div>
        @enderror
        <input type="text" name="email" placeholder="Email"  />
        @error('email')
            <div class="text-danger text-error_register">{{ $message }}</div>
        @enderror
        <input type="text" name="phone" placeholder="Phone"  />
        @error('phone')
            <div class="text-danger text-error_register">{{ $message }}</div>
        @enderror
        <input type="password" name="password" placeholder="Password"  />
        @error('password')
            <div class="text-danger text-error_register">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary btn-block btn-large">Register</button>
        <div class="tl_btn-under">
            <span><a href="{{route('login')}}" class="tl_btn-link">Sign in</a></span>
            <span><a href="#" class="tl_btn-link">Forgot password?</a></span>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>