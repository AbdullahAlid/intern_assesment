<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\File;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index',compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'model'=>'required',
                'vin' =>'required',
                'price' => 'required',
                'car_image' =>'required|mimes:jpg,jpeg,png|max:5048'
            ]
        );

        $car = new Car();
        $car->name = $request->name;
        $car->model = $request->model;
        $car->vin= $request->vin;
        $car->price = $request->price;
        if($request->hasfile('car_image')){
            $file=$request->file('car_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/cars',$filename);
            $car->car_image = $filename;
        }
        $car->save();
        return redirect()->route('car.index');
        
    }
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show',compact('car'));
    }
    public function delete($id)
    {
        Car::find($id)->delete();
        return redirect()->route('car.index');
    }
    public function edit($id)
    {
        $car = Car::find($id);
        return view('cars.edit',compact('car'));
    }
    public function update(Request $request,$id){
        $request->validate(
            [
                'name'=>'required',
                'model'=>'required',
                'vin' =>'required',
                'price' => 'required',
                'car_image' =>'mimes:jpg,jpeg,png|max:5048'
            ]
        );
        $car = Car::find($id);
        $car->name = $request->name;
        $car->model = $request->model;
        $car->vin= $request->vin;
        $car->price = $request->price;
        if($request->hasfile('car_image')){
            $destination='uploads/cars/'.$car->car_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('car_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/cars',$filename);
            $car->car_image = $filename;
        }
        $car->update();
        return redirect()->route('car.index');
    }

}
