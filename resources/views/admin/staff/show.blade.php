@extends('admin.admin_dashboard')

@section('main')

<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{$member->first_name}} {{$member->last_name}}'s Profile</h3>
        <p class="card-text">Role: {{$member->role}}</p>
        <p class="card-text">Email: {{$member->email}}</p>
        <p class="card-text">Phone: {{$member->phone}}</p>
        <p class="card-text">Address: {{$member->address}}</p>
    </div>

</div>

@endsection