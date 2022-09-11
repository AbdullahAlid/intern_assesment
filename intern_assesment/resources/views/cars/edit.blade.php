@extends('layouts.main')
@push('title')
    <title>Update car</title>    
@endpush
@section('main-section')
    <h1 class="text-center">
        Update car
    </h1>
    <form action="{{route('car.edit',$car->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{$car->name}}">
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Model</label>
            <input type="text" name="model" class="form-control" placeholder="" aria-describedby="helpId" value="{{$car->model}}">
            <span class="text-danger">
                @error('model')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Vin</label>
            <input type="text" name="vin" class="form-control" placeholder="" aria-describedby="helpId" value="{{$car->vin}}">
            <span class="text-danger">
                @error('vin')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control" placeholder="" aria-describedby="helpId" value="{{$car->price}}">
            <span class="text-danger">
                @error('price')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Photo</label>
            <input type="file" name="car_image" class="form-control" placeholder="" aria-describedby="helpId" value="{{$car->car_image}}">
            <span class="text-danger">
                @error('car_image')
                    {{$message}}
                @enderror
            </span>
        </div><br>
        <button class="btn btn-primary">
            Update
        </button>
    </form> 
    

@endsection