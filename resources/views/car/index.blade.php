@extends('layouts.app')
@extends('layouts.messages')
@section('content')
{{-- FIND YOUR CAR SECTION --}}
    <div id="" style="padding-top:70px;" class="bg-light">        
        <div class="container">
            {{-- search box --}}
            <div class="text-muted p-2">
                <form method="get" action="/search/cars/">
                @csrf
                    <div class="form-row">
                        <div class="col-lg-3 mb-2">                 
                        <input type="text" class="form-control " id="model" placeholder="Car model" name="model">
                        <small class="form-text text-danger">{{$errors->first('model')}}</small>
                        </div>                
                        <div class="col-lg-3 mb-2">
                            <select class="form-control text-muted" id="make" name="make">
                                <option value="%">Car make</option>
                                <option value="%">Any</option>
                                @foreach ($searchableMakes as $searchableMake)
                                <option value="{{$searchableMake}}">{{$searchableMake}}</option>
                                @endforeach                                                        
                            </select>
                            <small class="form-text text-danger">{{$errors->first('make')}}</small>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <div class="input-group">                     
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control " id="price" placeholder="Maximum price" name="price">                   
                            </div>
                            <small class="form-text text-danger">{{$errors->first('price')}}</small>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <input type="submit" value="SEARCH" class="btn btn-outline-primary btn-block ">
                        </div>
                    </div>   
                </form>
                
            </div> 
            
            {{--car listing  --}}
            <div class="row py-2">
                <div class="col-lg-12">
                    <section id="list-of-cars-section" class="bg-light text-muted ">                
                        <div class="row">
                        @if ($cars)
                        @foreach ($cars as $car)
                        <div class="col-lg-4">
                            <a href="/car/{{$car->id}}" class="text-decoration-none">
                                <div class="card mb-3 text-secondary">
                                    <img class="card-img-top card-image" 
                                    src= "/img/cars/{{$car->id}}_large.jpg" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">{{$car->make}} {{$car->model}}</h5>
                                    <p class="card-text">Year: {{$car->year}}</p>
                                    <p class="card-text">Price: ${{number_format($car->price, 2)}}</p>                                   
                                                                     
                                    </div>
                                </div>
                            </a>
                        </div> 
                        @endforeach
                                
                        @endif
                        </div>                    
                    </section>

                    {{-- If no search results --}}
                    <div class="text-muted p-2 text-center">
                        @if ($cars->isEmpty())
                        <p>Sorry there are no results for that search, please try searching for a different car.</p>
                            
                        @endif                      

                    </div>
                   
                    {{-- Pagination --}}

                    <div class="text-muted">
                        {{$cars->links()}}
                    </div>
                </div>                 
        </div>     
    </div>
</div>
</div>
  
@endsection
