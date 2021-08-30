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
    <h1 class="mt-2 pr-2">Orders</h1>
    
    
    
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">Ordered By</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($inquiries as $inquiry)
            <tr>
               
                <td>{{$inquiry->car->make}}</td>
                <td>{{$inquiry->car->model}}</td>
                <td><a href="/admin/users/{{$inquiry->user_id}}">{{$inquiry->user->first_name}} {{$inquiry->user->last_name}}</a></td>
                <td>{{$inquiry->created_at->toFormattedDateString()}}</td>
                <td><a href="" class="btn btn-outline-primary">Ship</a></td>
              </tr> 
            @endforeach
          
          
        </tbody>
      </table>
    {{-- Pagination --}}

    <div class="text-muted">
        {{$inquiries->links()}}
    </div>
@endsection