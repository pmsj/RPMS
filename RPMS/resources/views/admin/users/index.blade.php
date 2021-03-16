@extends('admin.admin_master')
@section('admin')
{{-- table row --}}
<div class="row mt--5">
  <div class="col-xl-12 p-4">
    <div class="card">
      <div class="card-header border-0 bg-default">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0 float-right text-white">Users List </h3>
          </div>
          <a href="{{route('admin.users.create')}}" class="badge badge-pill badge-warning badge-circle badge-lg display-inline-block"><i class="fas fa-plus-circle"></i></a>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">Total : <span class="badge badge-md badge-circle badge-floating badge-secondary border-white">{{count( $users)}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
        <table class="table align-items-center table-hover mb-3">
          <thead class="thead-light font-weight-bolder">
            <tr>
              {{-- <th scope="col">No.</th> --}}
              <th scope="col">User Id</th>
              <th scope="col">First Name</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Roles</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody class="">
            {{-- @php $i = 1 @endphp --}}
                @foreach ($users as $user)
                    <tr>
                    {{-- <td>{{$row->id}}</td> ---> This is real id number inside parish table--}}
                        {{-- <td>{{$users->firstItem()+$loop->index}}</td> --}}
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->middle_name}}</td>
                        <td>{{$user->sur_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{implode(', ', $user->roles()->get()->pluck('role_name')->toArray())}}</td>
                        <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">edit</i></a>
                          <a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger btn-sm" 
                             onclick="event.preventDefault();
                            if(confirm('Are you sure to delete it ?'))
                            {
                            document.getElementById('delete-user-from-{{$user->id}}').submit()
                            }
                            ">delete</i>
                          </a>
                          <form id="delete-user-from-{{$user->id}}" action="{{route('admin.users.destroy', $user->id)}}" method="POST" style="display:none">
                            @csrf
                            @method("DELETE")
                            </form>
                        </td>
                    </tr>
                @endforeach            
          </tbody>
        </table>
        {{$users->links()}}
      </div>
    </div>
  </div>
</div>
    
@endsection

