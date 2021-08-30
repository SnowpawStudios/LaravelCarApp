<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;

class DashboardController extends Controller
{
    public function index(){
        $cars = Car::all();
        $users = User::where('role', null)->get();
        $staff = User::where('role', 'staff')->get();
        $inquiries = Car::all()->count();

        $carCount = $cars->count();
        $userCount =$users->count();
        $staffCount = $staff->count();


        return view('admin.dashboard', [
            'carCount'=> $carCount,
            'userCount'=> $userCount,
            'staffCount'=> $staffCount,
            'inquiryCount' => $inquiries,
        ]);
    }
}
