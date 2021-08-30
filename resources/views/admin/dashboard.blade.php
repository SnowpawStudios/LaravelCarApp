@extends('admin.admin_dashboard')

@section('main')
<div class="row">
  <div class="col-lg-6 pb-2">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cars</h4>
        <p class="card-text">Cars in stock: <span class="text-info font-weight-bold">{{$carCount}}</span></p>
        <a href="{{route('admin.cars.index')}}" class="btn btn-primary btn-block">Cars</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6 pb-2">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Members</h4>
        <p class="card-text">Number of members: <span class="text-info font-weight-bold">{{$userCount}}</span></p>
        <a href="{{route('admin.users.index')}}" class="btn btn-primary btn-block">Members</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6 pb-2">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Staff</h4>
        <p class="card-text">Number of staff: <span class="text-info font-weight-bold">{{$staffCount}}</span></p>
        <a href="{{route('admin.staff.index')}}" class="btn btn-primary btn-block">Staff</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6 pb-2">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Orders</h4>
        <p class="card-text">Number of orders: <span class="text-info font-weight-bold">{{$inquiryCount}}</span></p>
        <a href="admin/inquiries" class="btn btn-primary btn-block">Orders</a>
      </div>
    </div>
  </div>
</div>

@endsection