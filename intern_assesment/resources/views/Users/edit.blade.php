@extends('layouts.main')
@push('title')
    <title>Edit User</title>    
@endpush
@section('main-section')
    <h1 class="text-center">
        Edit User
    </h1>
    
    <form action="{{route('user.edit',$user->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{$user->name}}">
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Phone No.</label>
            <input type="text" name="phone" class="form-control" placeholder="" aria-describedby="helpId" value="{{$user->phone}}">
            <span class="text-danger">
                @error('phone')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" class="form-control" placeholder="" aria-describedby="helpId" value="{{$user->address}}">
            <span class="text-danger">
                @error('address')
                    {{$message}}
                @enderror
            </span>
        </div>
        
        <br>
        <button class="btn btn-primary">
            Update
        </button>
    </form> 
    

@endsection