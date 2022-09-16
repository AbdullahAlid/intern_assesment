<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h3>Registration Form</h3>
                <hr>
                <form action="{{route('registerUser')}}" method="post">
                    @csrf
                    @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                @if (session()->has('fail'))
                    <div class="alert alert-success">
                        {{session('fail')}}
                    </div>
                @endif
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('name')}}">
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('email')}}">
            <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Phone No.</label>
            <input type="text" name="phone" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('phone')}}">
            <span class="text-danger">
                @error('phone')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('address')}}">
            <span class="text-danger">
                @error('address')
                    {{$message}}
                @enderror
            </span>
        </div>
        
        <div class="form-group">
            <label for="">password</label>
            <input type="password" name="password" class="form-control" placeholder="" aria-describedby="helpId">
            <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="" aria-describedby="helpId">
            <span class="text-danger">
                @error('password_confirmation')
                    {{$message}}
                @enderror
            </span>
        </div><br>
                    <button class="btn btn-primary rounded">
                        Register
                    </button><hr>
                    Already have an account?&nbsp;<a href="{{route('login')}}">Login</a>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>