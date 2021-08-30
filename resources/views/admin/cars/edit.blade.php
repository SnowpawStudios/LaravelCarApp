@extends('admin.admin_dashboard')

@section('main')
    <h1 class="mt-2 pr-2">Edit Details of {{$car->make}} {{$car->model}}</h1>

    <form autocomplete="off" action="{{route('admin.cars.update', $car->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Make</label>
            <input type="text" class="form-control {{$errors->has('make') ? 'border-danger' : '' }}" id="make" name="make" value="{{ old('make') ?? $car->make}}">
            <small class="form-text text-danger">{{$errors->first('make')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Model</label>
            <input type="text" class="form-control {{$errors->has('model') ? 'border-danger' : '' }}" id="model" name="model" value="{{ old('model') ?? $car->model }}">
            <small class="form-text text-danger">{{$errors->first('model')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Engine</label>
            <input type="text" class="form-control {{$errors->has('engine') ? 'border-danger' : '' }}" id="engine" name="engine" value="{{ old('engine') ?? $car->engine}}">
            <small class="form-text text-danger">{{$errors->first('engine')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Year</label>
            <input type="text" class="form-control {{$errors->has('year') ? 'border-danger' : '' }}" id="year" name="year" value="{{ old('year') ?? $car->year}}">
            <small class="form-text text-danger">{{$errors->first('year')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Mileage</label>
            <input type="text" class="form-control {{$errors->has('mileage') ? 'border-danger' : '' }}" id="mileage" name="mileage" value="{{ old('mileage') ?? $car->mileage}}">
            <small class="form-text text-danger">{{$errors->first('mileage')}}</small>
        </div>
        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control {{$errors->has('price') ? 'border-danger' : '' }}" id="price" name="price" value="{{ old('price') ?? $car->price}}">
            <small class="form-text text-danger">{{$errors->first('price')}}</small>
        </div>
        
        @if (file_exists('img/cars/'. $car->id .'_large.jpg'))
            <div class="mb-2">
                <img style="max-width:400px; max-height:300px;" src="/img/cars/{{$car->id}}_large.jpg" alt="">
                <a class="btn btn-outline-danger float-right" href="/admin-delete-images/car/{{$car->id}}">DELETE IMAGE</a>
            </div>
        @endif
        
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control {{$errors->has('image') ? 'border-danger' : '' }}" id="image" name="image" value="">
            <small class="form-text text-danger">{{$errors->first('image')}}</small>
        </div>
        
        
        <input class="btn btn-primary mt-4" type="submit" value="Update Car">
    </form>


    

@endsection