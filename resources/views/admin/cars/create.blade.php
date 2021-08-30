@extends('admin.admin_dashboard')

@section('main')
    <h1 class="mt-2 pr-2">Enter new Car</h1>

    <form autocomplete="off" action="{{route('admin.cars.store')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label for="name">Make</label>
            <input type="text" class="form-control {{$errors->has('make') ? 'border-danger' : '' }}" id="make" name="make" value="{{ old('make') }}">
            <small class="form-text text-danger">{{$errors->first('make')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Model</label>
            <input type="text" class="form-control {{$errors->has('model') ? 'border-danger' : '' }}" id="model" name="model" value="{{ old('model') }}">
            <small class="form-text text-danger">{{$errors->first('model')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Engine</label>
            <input type="text" class="form-control {{$errors->has('engine') ? 'border-danger' : '' }}" id="engine" name="engine" value="{{ old('engine') }}">
            <small class="form-text text-danger">{{$errors->first('engine')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Year</label>
            <input type="text" class="form-control {{$errors->has('year') ? 'border-danger' : '' }}" id="year" name="year" value="{{ old('year') }}">
            <small class="form-text text-danger">{{$errors->first('year')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Mileage</label>
            <input type="text" class="form-control {{$errors->has('mileage') ? 'border-danger' : '' }}" id="mileage" name="mileage" value="{{ old('mileage') }}">
            <small class="form-text text-danger">{{$errors->first('mileage')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control {{$errors->has('price') ? 'border-danger' : '' }}" id="price" name="price" value="{{ old('price') }}">
            <small class="form-text text-danger">{{$errors->first('price')}}</small>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control {{$errors->has('image') ? 'border-danger' : '' }}" id="image" name="image" value="">
            <small class="form-text text-danger">{{$errors->first('image')}}</small>
        </div>
        
        
        <input class="btn btn-primary mt-4" type="submit" value="Save Car">
    </form>


    

@endsection