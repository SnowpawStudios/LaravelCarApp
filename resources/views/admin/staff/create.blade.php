@extends('admin.admin_dashboard')

@section('main')
    <h1 class="mt-2 pr-2 ">Enter New Staff Member Details</h1>

    <form action="{{route('admin.staff.store')}}" method="post" >
        @csrf
        <div class="form-group">
            <label for="name">First name</label>
            <input type="text" class="form-control {{$errors->has('first_name') ? 'border-danger' : '' }}" id="first_name" name="first_name" value="{{ old('first_name') }}">
            <small class="form-text text-danger">{{$errors->first('first_name')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Last name</label>
            <input type="text" class="form-control {{$errors->has('last_name') ? 'border-danger' : '' }}" id="last_name" name="last_name" value="{{ old('last_name') }}">
            <small class="form-text text-danger">{{$errors->first('last_name')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control {{$errors->has('address') ? 'border-danger' : '' }}" id="address" name="address" value="{{ old('address') }}">
            <small class="form-text text-danger">{{$errors->first('address')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Phone</label>
            <input type="text" class="form-control {{$errors->has('phone') ? 'border-danger' : '' }}" id="phone" name="phone" value="{{ old('phone') }}">
            <small class="form-text text-danger">{{$errors->first('phone')}}</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control {{$errors->has('email') ? 'border-danger' : '' }}" id="email" name="email" value="{{ old('email') }}">
            <small class="form-text text-danger">{{$errors->first('email')}}</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control {{$errors->has('password') ? 'border-danger' : '' }}" id="password" name="password" value="{{ old('password') }}">
            <small class="form-text text-danger">{{$errors->first('password')}}</small>
        </div>
        
        
        <input class="btn btn-primary mt-4" type="submit" value="Save Staff Member">
    </form>


    

@endsection