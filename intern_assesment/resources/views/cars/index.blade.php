@extends('layouts.main')
@push('title')
    <title>All cars</title>    
@endpush
@section('main-section')
@if (session()->has('error'))
                    <div class="alert alert-success">
                        {{session('error')}}
                    </div>
                @endif
    <h1 class="text-center">
        All cars    </h1> 
        <p align="right"><a href="{{route('car.create')}}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
          <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
        </svg>&nbsp;Add new car.</a></p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($cars as $car)
            <div class="col">
                <div class="card h-100">
                  <img src="{{asset('uploads/cars/'.$car->car_image)}}" height="200px" width="200px" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">{{$car->name.' ('.$car->model.')'}}</h5>
                    <p align="right">${{$car->price}}</p>
                    <p>{{$car->vin}}</p>
                    <p class="text-center"><a href="{{route('car.show',$car->id)}}" class="btn btn-primary">Details</a></p>
                    
                  </div>
                
                </div>
              </div>
            @endforeach
        </div>
        
    
@endsection
{{--<div class="card" style="width: 18rem;">
    <img src="{{asset('uploads/cars/'.$car->car_image)}}"  class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      
    </div>
</div>--}}