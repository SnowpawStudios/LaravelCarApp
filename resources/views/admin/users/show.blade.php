@extends('admin.admin_dashboard')

@section('main')

<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{$user->first_name}} {{$user->last_name}}'s Details</h3>
        <p class="card-text">Name: {{$user->first_name}} {{$user->last_name}}</p>
        <p class="card-text">Address: {{$user->address}}</p>
        <p class="card-text">Email: {{$user->email}}</p>
        <p class="card-text">Phone: {{$user->phone}}</p>
        <hr>
        <h5 class="card-subtitle mb-2 text-muted">Inquiries</h5>
        @foreach ($user->inquiries as $inquiry)
        <p class="card-text mb-2">{{$inquiry->car->make}} {{$inquiry->car->model}} ordered on {{$inquiry->created_at->toFormattedDateString()}}</p>
        @endforeach
        
    </div>

</div>

@endsection