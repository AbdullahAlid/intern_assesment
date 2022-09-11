@extends('layouts.main')
@push('title')
    <title>Edit Admin</title>    
@endpush
@section('main-section')
    <h1 class="text-center">
        Edit Admin
    </h1>
    
    <form action="{{route('admin.edit',$admin->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{$admin->name}}">
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{$admin->email}}">
            <span class="text-danger">
                @error('email')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Phone No.</label>
            <input type="text" name="phone" class="form-control" placeholder="" aria-describedby="helpId" value="{{$admin->phone}}">
            <span class="text-danger">
                @error('phone')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" class="form-control" placeholder="" aria-describedby="helpId" value="{{$admin->address}}">
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