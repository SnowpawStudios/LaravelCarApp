<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Session;


class FrontCarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(9);
        $searchableMakes = $cars->pluck('make')->unique();
        $numberOfItems = $cars->count();
        return view('car.index', [
            'cars' => $cars,
            'searchableMakes' =>$searchableMakes,
            'numberOfItems' => $numberOfItems,
                       
        ]);
    }

    public function show(Car $car)
    {
        $user =auth()->user();
        if($user)
            $userHasInquired = $car->inquiries->where('user_id', $user->id)->isEmpty();
        else
            $userHasInquired= FALSE;
        
        return view('car.show', [
            'car'=> $car,
            'userHasInquired'=> $userHasInquired,
            'message_success'=> Session::get('message_success'),
        ]);
    }

    public function search(Request $request){
    
        $request->validate([
            'model' => 'max:255|string|nullable',
            'make' => 'max:255|string|nullable',
            'price' => 'numeric|string|nullable'
        ]);

        $model = $request->model;
        $make = $request->make;
        $price = $request->price;
        
        $maxPrice = Car::max('price');
        
        if($price==null)
            $price=$maxPrice;

        if($model==null)
            $model = "%";
       
        $mySearch = Car::where([
            ['make', 'LIKE', $make],
            ['price', '<=', $price],
            ['model', 'LIKE', $model]
            ])
            ->paginate(12)->withQueryString();

        $numberOfItems = $mySearch->count();               
        $searchableMakes = Car::pluck('make');
        
        return view('car.index', [
            'cars'=>$mySearch,
            'searchableMakes'=> $searchableMakes,
            'numberOfItems' => $numberOfItems,
        ]);
    }
}
