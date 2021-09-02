<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;


class AdminInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $inquiries = Inquiry::latest()->paginate(9);
        
        return view('admin.orders.index', [
            'inquiries'=> $inquiries,
        ]);
    }
}