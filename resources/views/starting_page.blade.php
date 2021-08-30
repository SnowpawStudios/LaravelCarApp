@extends('layouts.app')
@extends('layouts.messages')

@section('content')
{{-- HOME SECTION --}}
<header id="home-section">
  <div class="dark-overlay">
    <div class="home-inner container">
      <div class="row">
        <div class="col-lg-8 d-none d-lg-block">        
            <h1 class="display-4">The best cars in Oz</h1>
            <div class="d-flex">
              <div class="p-4 align-self-start">
                  <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt nulla illum ipsum.
              </div>
          </div>
          <div class="d-flex">
              <div class="p-4 align-self-start">
                  <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt nulla illum ipsum.
              </div>
          </div>
          <div class="d-flex">
              <div class="p-4 align-self-start">
                  <i class="fas fa-check fa-2x"></i>
              </div>
              <div class="p-4 align-self-end">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt nulla illum ipsum.
              </div>
          </div>          
        </div>
        
        {{-- SEARCH FORM --}}
        <div class="col-lg-4">
          <div class="card bg-primary text-center card-form">
            <div class="card-body">
              <h3>Search Cars</h3>
              <hr class="bg-light">
              <form method="get" action="/search/cars/">
                @csrf
              <div class="form-group">                
                <input type="text" class="form-control form-control-lg" id="model" placeholder="Car model" name="model">
                <small class="form-text text-warning">{{$errors->first('model')}}</small>
              </div>
              <div class="form-group">
                  <select class="form-control form-control-lg text-muted" id="make" name="make">
                      <option value="%">Car make</option>
                      <option value="%">Any</option>
                      @foreach ($makes as $make)
                        <option value="{{$make}}">{{$make}}</option>
                      @endforeach                                                        
                  </select>
                  <small class="form-text text-warning">{{$errors->first('make')}}</small>
              </div>
              <div class="input-group">                     
                <div class="input-group-prepend">
                  <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control form-control-lg" id="price" placeholder="Maximum price" name="price">                   
              </div>
              <small class="form-text text-warning">{{$errors->first('price')}}</small>
              <input type="submit" value="SEARCH" class="btn btn-outline-light btn-block mt-4">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</header>
<!-- Latest head -->
<section id="explore-head-section" class= "text-muted">
  <div class="container">
      <div class="row">
          <div class="col text-center py-3 explore-heading">
              <h1 class="display-4">Our latest cars</h1>                         
          </div>          
      </div>
        
  </div>
</section>

<!-- Latest cars -->
<section id="latest-cars-section" class="bg-light text-muted py-3">
  <div class="container">
      <div class="row">
        @if ($latestCars)
        @foreach ($latestCars as $latestCar)
          <div class="col-lg-4">
            <a href="/car/{{$latestCar->id}}" class="text-decoration-none">
              <div class="card mb-3 text-secondary">
                  <img class="card-img-top card-image" 
                  src= "/img/cars/{{$latestCar->id}}_large.jpg" alt="Card image cap">
                  <div class="card-body">
                  <h5 class="card-title">{{$latestCar->make}} {{$latestCar->model}}</h5>
                  <p class="card-text">Year: {{$latestCar->year}}</p>
                  <p class="card-text">Price: ${{number_format($latestCar->price, 2)}}</p>
                  </div>
              </div>
            </a>
        </div> 
        @endforeach        
        @endif 
        
        <a href="/car" class="btn btn-outline-primary col-12 d-block mt-4 ">Search for more</a>
      </div>
  </div>
</section>

<!-- Explore section -->
<section id="explore-section" class="bg-light text-muted py-5">
  <div class="container">
      <div class="row">
          <div class="col-md-6">
              <img src="/images/design/orange.jpeg" alt="" class="img-fluid mb-3 rounded-circle">
          </div>
          <div class="col-md-6">
              <h3>More Services</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos magnam itaque aliquid harum facilis tempora, similique omnis sunt! Eum, corrupti!</p>
              <div class="d-flex">
                  <div class="p-4 align-self-start">
                      <i class="fas fa-check fa-2x"></i>
                  </div>
                  <div class="p-4 align-self-end">
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam voluptatem saepe voluptates?
                  </div>
              </div>
              <div class="d-flex">
                  <div class="p-4 align-self-start">
                      <i class="fas fa-check fa-2x"></i>
                  </div>
                  <div class="p-4 align-self-end">
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam voluptatem saepe voluptates?
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


@endsection
