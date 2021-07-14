<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/now-ui-dashboard.css')}}">
    <title>Admin Login</title>
    <style>
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            /* background: red; */
        }
        .container .box{
            width: 450px;
            height: auto;
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.25);
        }
        .loginHeader{
            text-align: center;
            padding: 5px;
            border-bottom: 3px solid lightgray;
            margin-bottom: 10px;
        }
        .form-group{
            font-size: 17px;
        }
    </style>
</head>
<body>
    <div class="container">
      
        <div class="box">
            <div class="loginHeader">
                <h2>Register</h2>
            </div>
            <form action="{{route('admin/register_process')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <span class="text-danger">{{session('email_error')}}</span>
                
                <br>
                <div class="form-group">
                    <label for="" class="">Gender</label>&nbsp;&nbsp;
                    <input type="radio" name="gender" checked value="male">&nbsp;<label for="">male</label>
                    <input type="radio" name="gender" value="female">&nbsp;<label for="">female</label>
                </div>
                @error('gender')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <button type="submit" class="btn btn-success w-100">Sign In</button>
                <span class="text-success">{{session('msg')}}</span>
            </form>
        <div class="text-center"> 
            <a href="{{('/')}}" class="text-warning font-weight-bold">Already Have account, Login In !</a>
        </div>
        </div>
    </div>
</body>
</html>