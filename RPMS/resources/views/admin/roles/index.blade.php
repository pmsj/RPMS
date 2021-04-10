@extends('admin.admin_master')
@section('title', 'Roles')
@section('admin')
{{-- table row --}}
<div class="row mt--5">
  <div class="col-xl-12 p-4">
    <div class="card">
      <div class="card-header border-0 bg-default">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0 float-right text-white">Roles List</h3>
          </div>
          <a href="{{route('admin.roles.create')}}" class="badge badge-pill badge-warning badge-circle badge-lg display-inline-block"><i class="fas fa-plus-circle"></i></a>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">Total : <span class="badge badge-md badge-circle badge-floating badge-secondary border-white">{{count( $roles)}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
        <table class="table align-items-center table-hover mb-3">
          <thead class="thead text-primary">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Roles</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody class="">
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->role_name}}</td>
                        <td><a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning btn-sm">edit</i></a>
                          <a href="{{ route('admin.roles.destroy', $role->id) }}" class="btn btn-danger btn-sm"
                            onclick="event.preventDefault();
                            if(confirm('Sure, you want to delete it ?'))
                            {
                            document.getElementById('delete-role-form-{{$role->id}}').submit()
                            }">delete</a>
                          <form id="delete-role-form-{{$role->id}}" action="{{route('admin.roles.destroy', $role->id)}}" method="POST" style="display: none">
                          @csrf
                          @method('DELETE')
                          </form>                          
                        </td>
                    </tr>
                @endforeach            
          </tbody>
        </table>  
      </div>
    </div>
  </div>
</div>
    
@endsection

