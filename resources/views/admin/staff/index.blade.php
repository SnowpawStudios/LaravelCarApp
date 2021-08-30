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
    <h1 class="mt-2 pr-2">Staff</h1>
    <div class= "d-flex justify-content-md-between">
        <a href="{{route('admin.staff.create')}}" class="btn btn-success mb-2">Add New</a>

        <form class="form-inline mb-2 " method = "get" action = "/admin/search/staff">
            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success " type="submit">Search</button>
        </form>
    </div>
    
    
    
    <table class="table table-striped">
        <thead>
          <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Joined</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($staff as $member)
            <tr>
                {{-- <th scope="row">1</th> --}}
                <td><a href="{{route('admin.staff.show', $member->id)}}">{{$member->first_name}}</a></td>
                <td>{{$member->last_name}}</td>
                <td>{{$member->address}}</td>
                <td>{{$member->phone}}</td>
                <td>{{$member->email}}</td>
                <td class="text-capitalize">{{$member->role}}</td>
                <td>{{$member->created_at->toFormattedDateString()}}</td>
                <td><a href="{{route('admin.staff.edit', $member->id)}}" class="btn btn-outline-primary">EDIT</a></td>
                <td>
                  <form action="{{route('admin.staff.show', $member->id)}}" method="post">
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
        {{$staff->links()}}
      </div>

@endsection