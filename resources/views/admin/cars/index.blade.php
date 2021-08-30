@extends('admin.admin_dashboard')

@section('main')
    <div class="container">
      @isset($message_success)
          <div class="alert alert-success" role="alert">
              {{$message_success}}                    
          </div>
      @endisset

      @isset($message_warning)
          <div class="alert alert-warning" role="alert">
              {{$message_warning}}                    
          </div>
      @endisset
    </div>

    <h1 class="mt-2 pr-2">Cars</h1>
    <div class= "d-flex justify-content-md-between">
      <a href="{{route('admin.cars.create')}}" class="btn btn-success mb-2">Add New Car</a>
        <form class="form-inline mb-2" method="get" action="/admin/search/cars">
          @csrf
            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success " type="submit">Search</button>
        </form>
    </div>
       
    <table class="table table-striped">
        <thead>
          <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">Engine</th>
            <th scope="col">Year</th>
            <th scope="col">Price</th>
            <th scope="col">Mileage</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{$car->make}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->engine}}</td>
                <td>{{$car->year}}</td>
                <td>{{$car->price}}</td>
                <td>{{$car->mileage}}</td>
                @if (file_exists('img/cars/'. $car->id . '_large.jpg'))
                  <td><img  style="max-width:80px;" src="/img/cars/{{$car->id}}_large.jpg" alt="car thumb"></td>
                @else
                <td class="text-danger">No image</td>
                @endif
                
                <td><a href="/admin/cars/{{$car->id}}/edit" class="btn btn-outline-primary">EDIT</a></td>
                <td>
                  <form action="/admin/cars/{{$car->id}}" method="post">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="DELETE" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                  </form>
                </td>               
              </tr> 
            @endforeach
          
          
        </tbody>
      </table>
      {{-- Pagination --}}

      <div class="text-muted">
        {{$cars->links()}}
      </div>
@endsection