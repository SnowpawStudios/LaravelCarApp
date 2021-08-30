
@extends('layouts.app')
@section('content')
<div class="container text-muted" style= "padding-top:100px;">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <hr>
            <h3>Admin Panel</h3>
            <hr>
            <div class="d-flex" id="wrapper">
                <!-- Sidebar-->
                <div class="border-end bg-white" id="sidebar-wrapper">
                    
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action list-group-item-light pl-1 pb-1" href="/admin"><h5>Dashboard</h5></a>
                        <a class="list-group-item list-group-item-action list-group-item-light list-group-item-text pl-1 pb-1" href="{{route('admin.users.index')}}"><h5>Members</h5></a>
                        <a class="list-group-item list-group-item-action list-group-item-light pl-1 pb-1" href="{{route('admin.cars.index')}}"><h5>Cars</h5></a>
                        <a class="list-group-item list-group-item-action list-group-item-light pl-1 pb-1" href="/admin/inquiries"><h5>Orders</h5></a>
                        @if (Auth::user() && auth()->user()->role == 'admin')
                            <a class="list-group-item list-group-item-action list-group-item-light pl-1 pb-1" href="/admin/staff/"><h5>Staff</h5></a>
                        @endif
                        
                    </div>
                </div>                           
                    <!-- Page content-->
                    <div class="container-fluid">
                        @yield('main')
                    </div>               
            </div>
            
        </div>
    </div>
</div>
@endsection