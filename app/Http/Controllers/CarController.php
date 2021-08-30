<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cars = Car::paginate(9);
        return view('admin.cars.index', [
            'cars'=>$cars,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required|max:255',
            'model'=> 'required|max:255',
            'engine'=> 'required|max:255',
            'year'=> 'required|integer|min:1900|max:4000',
            'mileage'=> 'required|numeric',
            'price'=> 'required|numeric',
            'image'=> 'required|mimes:jpeg,jpg,bmp,png,gif',
        ]);       

        $car = new Car([
            'make'=> $request->make,
            'model'=> $request->model,
            'engine'=> $request->engine,
            'year'=> $request->year,
            'mileage'=> $request->mileage,
            'price'=> $request->price,
        ]);
        $car->save();

        if($request->image){
            $this->saveImages($request->image, $car->id);
        }                                                                                                                                                                                                                                                                                   return $this->index()->with([
            'message_success' => 'The '. $car->model. ' was saved!',

        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {              
        return view('car.show')->with([
            'car'=> $car,           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit')->with([
            'car'=>$car,
            'message_success'=> Session::get('message_success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'make' => 'required|max:255',
            'model'=> 'required|max:255',
            'engine'=> 'required|max:255',
            'year'=> 'required|integer|min:1900|max:4000',
            'mileage'=> 'required|numeric',
            'price'=> 'required|numeric',
            'image'=> 'mimes:jpeg,jpg,bmp,png,gif',
        ]);

        if($request->image){
            $this->saveImages($request->image, $car->id);
        }
       

        $car->update([
            'make'=> $request->make,
            'model'=> $request->model,
            'engine'=> $request->engine,
            'year'=> $request->year,
            'mileage'=> $request->mileage,
            'price'=> $request->price,
        ]);       

        return $this->index()->with([
            'message_success' => 'The '. $car->model. ' was updated!',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $oldName= $car->model;
        $car->delete();
        return $this->index()->with([
            'message_success' => 'The '. $oldName . ' was deleted!',

        ]);
    }

    public function saveImages($imageInput, $car_id){       
            $image = Image::make($imageInput);
            $image->widen(1200)
            ->save(public_path(). "/img/cars/". $car_id ."_large.jpg");
        
    }

    public function deleteImages($car_id){
        
        if(file_exists(public_path(). "/img/cars/". $car_id ."_large.jpg"))
            unlink(public_path()."/img/cars/". $car_id ."_large.jpg");
        
        return back()->with([
            'message_success' => 'The image was deleted!',
        ]);

    }

    public function search(){       
        $search = $_GET['search'];
        
        $search_items = Car::where('model', 'LIKE', '%' . $search .'%')->orWhere('make', 'LIKE', '%' . $search .'%')->paginate(9); 
        //dd($search_items);       
        return view('admin.cars.index', [
            'cars'=>$search_items,
        ]);
    }
}
