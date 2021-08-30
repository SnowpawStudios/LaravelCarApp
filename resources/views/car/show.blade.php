@extends('layouts.app')
@extends('layouts.messages')
@section('content')
<div class="text-muted" style= "padding-top:70px;">
    <div class="container py-4">
        <h3 class="text-center">{{$car->model}}</h3>
        <hr>

        <div class="row">
            <div class="col-lg-6">
                <ul>
                    <p>Make: {{$car->make}}</p>
                    <p>Model: {{$car->model}}</p>
                    <p>Year: {{$car->year}}</p>
                    <p>Price: ${{number_format($car->price, 2)}}</p>
                </ul>
                <div class="d-block text-center mt-4 align-self-end mb-2">
                    @auth               
                        @if ($userHasInquired == False)
                            <p class="py-2 bg-warning">You have ordered this car!</p>
                        @else
                        <form action="{{route('inquiry.store', ['car'=> $car])}}" method="post">
                            @csrf                                              
                            <input class="btn btn-success  btn-block" type="submit" value="Order this car!">
                        </form>
                        @endif                           
                    @endauth
                    
                    @guest
                    <a href="/login" class="btn btn-outline-primary d-block">Register or log in to order this car!</a>                
                    @endguest                
                </div>
            </div>
            <div class="col-lg-6" >
                @if (file_exists('img/cars/' . $car->id . '_large.jpg'))
                    <div class="" >
                        <a href="/img/cars/{{$car->id}}_large.jpg" data-lightbox="img/cars/{{$car->id}}_large.jpg" data-title="{{$car->model}}">
                            <img src="/img/cars/{{$car->id}}_large.jpg" alt="" class="img-fluid" >
                        </a>
                                    Click image to enlarge
                    </div>
                @endif
            </div>           
        </div>
        
    </div>
   
                
          
</div>
@endsection
