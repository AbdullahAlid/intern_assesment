@extends('layouts.main')
@push('title')
    <title>Add car</title>    
@endpush
@section('main-section')
    <h1 class="text-center">
        Create new car
    </h1>
    <form action="{{url('/')}}/car/create" method="post" enctype="multipart/form-data">
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
            <label for="">Model</label>
            <input type="text" name="model" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('model')}}">
            <span class="text-danger">
                @error('model')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Vin</label>
            <input type="text" name="vin" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('vin')}}">
            <span class="text-danger">
                @error('vin')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('price')}}">
            <span class="text-danger">
                @error('price')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="">Photo</label>
            <input type="file" name="car_image" class="form-control" placeholder="" aria-describedby="helpId" value="{{old('car_image')}}">
            <span class="text-danger">
                @error('car_image')
                    {{$message}}
                @enderror
            </span>
        </div><br>
        <button class="btn btn-primary">
            Add
        </button>
    </form> 
    

@endsection