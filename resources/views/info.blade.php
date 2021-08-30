@extends('layouts.app')
@extends('layouts.messages')
@section('content')

<div class="container text-muted" style= "padding-top:70px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$user->first_name}} {{$user->last_name}}'s Profile</h3>
                </div>

                <div class="card">
                    <div class="card-body">                        
                        <p class="card-text">Name: {{$user->first_name}} {{$user->last_name}}</p>
                        <p class="card-text">Address: {{$user->address}}</p>
                        <p class="card-text">Email: {{$user->email}}</p>
                        <p class="card-text">Phone: {{$user->phone}}</p>
                        <hr>
                        <h5 class="card-subtitle mb-2 text-muted">Orders</h5>
                        @foreach ($user->inquiries as $inquiry)
                        <p class="card-text mb-2">You ordered the {{$inquiry->car->make}} {{$inquiry->car->model}} on {{$inquiry->created_at->toFormattedDateString()}} for ${{$inquiry->car->price}}</p>
                        @endforeach                        
                    </div>                
                </div>              
            </div>
        </div>
    </div>
</div>
@endsection
