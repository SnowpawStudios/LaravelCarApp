@extends('admin.admin_dashboard')

@section('main')
    <h1 class="mt-2 pr-2 ">Update Staff Member Details</h1>
    <form action="{{route('admin.staff.update', $member->id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">First name</label>
            <input type="text" class="form-control {{$errors->has('first_name') ? 'border-danger' : '' }}" id="first_name" name="first_name" value="{{ old('first_name') ?? $member->first_name}}">
            <small class="form-text text-danger">{{$errors->first('first_name')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Last name</label>
            <input type="text" class="form-control {{$errors->has('last_name') ? 'border-danger' : '' }}" id="last_name" name="last_name" value="{{ old('last_name') ?? $member->last_name}}">
            <small class="form-text text-danger">{{$errors->first('last_name')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control {{$errors->has('address') ? 'border-danger' : '' }}" id="address" name="address" value="{{ old('address') ?? $member->address}}">
            <small class="form-text text-danger">{{$errors->first('address')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Phone</label>
            <input type="text" class="form-control {{$errors->has('phone') ? 'border-danger' : '' }}" id="phone" name="phone" value="{{ old('phone') ?? $member->phone}}">
            <small class="form-text text-danger">{{$errors->first('phone')}}</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control {{$errors->has('email') ? 'border-danger' : '' }}" id="email" name="email" value="{{ old('email') ?? $member->email}}">
            <small class="form-text text-danger">{{$errors->first('email')}}</small>
        </div>
        
        
        <input class="btn btn-primary mt-4" type="submit" value="Update Staff Member Details">
    </form>


    

@endsection