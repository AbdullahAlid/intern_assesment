@extends('layouts.main')
@push('title')
    <title>Registration</title>    
@endpush
@section('main-section')
    <h1 class="text-center">
        Add new admin
    </h1>
    
    <form action="{{route('admin.create')}}" method="post">
        @csrf
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
            <label for="">Username</label>
            <input type="text" name="username" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('username')}}">
            <span class="text-danger">
                @error('username')
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
        </div>
        <br>
        <button class="btn btn-primary">
            Register
        </button>
    </form> 
    

@endsection