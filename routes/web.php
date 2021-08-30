<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontCarController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Car;
use App\Models\Inquiry;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// LANDING PAGE
Route::get('/', function () {
    $makes = Car::pluck('make');
    $latestCars = Car::all()->sortDesc()->take(3);
    return view('starting_page',[       
        'makes'=> $makes,
        'latestCars' => $latestCars,
        
    ]);
})->name('landing_page');

// USER'S OWN PROFILE PAGE
Route::get('/info', function () {
    $user = Auth::user();
    if($user){
        $inquiries = Inquiry::where('user_id', '=', $user->id)->get();
    }
    else $inquiries = null;
    
    return view('info')->with([
        'inquiries' => $inquiries,
        'user' =>$user,
    ]);
});


//FRONT END CAR PAGES
Route::get('/car', [FrontCarController::class, 'index'])->name('list_cars');
Route::get('/car/{car}', [FrontCarController::class, 'show'])->name('show_car');

//Search for cars on frontend
Route::get('/search/cars/', [FrontCarController::class, 'search'])->name('search_cars');;

//Inquiries
Route::resource('/inquiry',InquiryController::class);

//Inquiries on admin side


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ADMIN ROUTES

Route::get('/admin',[DashboardController::class, 'index'])->middleware('staff');
Route::resource('admin/users', UserController::class, ['as'=> 'admin'])->middleware('staff');
Route::resource('admin/cars', CarController::class, ['as'=> 'admin'])->middleware('staff');
Route::resource('admin/staff',StaffController::class, ['as'=> 'admin'])->middleware('admin');

//Inquiries on admin side
Route::get('/admin/inquiries', [InquiryController::class, 'index'])->middleware('staff');

//delete car images
Route::get('/admin-delete-images/car/{car_id}',[CarController::class, 'deleteImages'])->middleware('staff');

//search cars in admin
Route::get('/admin/search/cars',[CarController::class, 'search'])->middleware('staff');

//search users in admin
Route::get('/admin/search/users',[UserController::class, 'search'])->middleware('staff');

//search staff in admin
Route::get('/admin/search/staff',[StaffController::class, 'search'])->middleware('staff');

//search orders in admin
Route::get('/admin/search/orders',[InquiryController::class, 'search'])->middleware('staff');

