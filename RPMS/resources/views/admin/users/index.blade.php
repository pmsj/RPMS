@extends('admin.admin_master')
@section('title', 'All Users')
@section('admin')
{{-- table row --}}
<div class="row mt--5">
  <div class="col-xl-12 p-4">
    <div class="card">
      <div class="card-header border-0 bg-default">
        <div class="row align-items-center">
          <div class="mt-2">
            <input class="form-control d-block" id="myInput" type="text" placeholder="Search table here...">
          </div>
          <div class="col">
            <h3 class="mb-0 text-center text-white">            
                  Users List 
                  <a href="{{route('admin.users.create')}}" class="badge badge-pill badge-warning badge-circle badge-lg  text-center"><i class="fas fa-plus-circle"></i></a>
            </h3>
          </div>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">Total : <span class="badge badge-sm badge-circle  badge-secondary border-white">{{$users->total()}}</span></a>
          </div>
        </div>
         
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
        <table class="table align-items-center table-hover mb-3">
          <thead class="thead-dark font-weight-bolder">
            <tr>
              <th scope="col" class="text-white">S.No</th>
              <th scope="col" class="text-white">First Name</th>
              <th scope="col" class="text-white">Middle Name</th>
              <th scope="col" class="text-white">Last Name</th>
              <th scope="col" class="text-white">Email</th>
              <th scope="col" class="text-white">Roles</th>
              <th scope="col" class="text-white">Actions</th>
            </tr>
          </thead>
          <tbody class="" id="myTable">
                @foreach ($users as $user)
                    <tr>
                        <td>{{$users->firstItem()+$loop->index}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->middle_name}}</td>
                        <td>{{$user->sur_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{implode(', ', $user->roles()->get()->pluck('role_name')->toArray())}}</td>

                        {{-- edit button --}}
                        <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">edit</i></a>

                          {{-- delete button --}}
                          <a href="{{route('admin.user.softDelete', $user->id)}}" class="btn btn-danger btn-sm"> Trash <i class="fas fa-trash text-white mr-2"></i></a>
                        </td>
                    </tr>
                @endforeach            
          </tbody>
        </table>
        {{$users->appends(['RecycleBin' => $RecycleBin->currentPage()])->links()}}
      </div>
    </div>
  </div>
</div>

{{-- User Trash list --}}
<div class="row mt--5">
  <div class="col-xl-12 p-4">
    <div class="card">
      <div class="card-header border-0 bg-white">
        <div class="row align-items-center">
            <div class="mt-2">
            <input class="form-control d-block boarder-primary" id="Input" type="text" placeholder="Search table here...">
          </div>
          <div class="col">
            <h3 class="mb-0 float-right text-info font-weight-bolder"> <i class="fas fa-trash text-danger display-4 mr-2"></i> Users Trash List </h3>
          </div>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">Total : <span class="badge badge-sm badge-circle  badge-secondary border-white">{{$RecycleBin->total()}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
         @if(count($RecycleBin) > 0)
        <!-- Projects table -->
        <table class="table align-items-center table-hover mb-3">
          <thead class="thead-light font-weight-bolder">
            <tr>
              <th scope="col">User Id</th>
              <th scope="col">First Name</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Roles</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody class="" id="Trash">
                @foreach ($RecycleBin as $trash)
                    <tr>
                        <td>{{$trash->id}}</td>
                        <td>{{$trash->first_name}}</td>
                        <td>{{$trash->middle_name}}</td>
                        <td>{{$trash->sur_name}}</td>
                        <td>{{$trash->email}}</td>
                        <td>{{implode(', ', $user->roles()->get()->pluck('role_name')->toArray())}}</td>
                        <td><a href="{{ route('admin.user.restore', $trash->id) }}" class="btn btn-success btn-sm"><i class="fas fa-arrow-alt-circle-up"></i> Restore</i></a>
                          {{-- delete button --}}
                          <a href="{{ route('admin.users.destroy', $trash->id) }}" class="btn btn-danger btn-sm" 
                             onclick="event.preventDefault();
                            if(confirm('Sure to permanently delete this user ?'))
                            {
                            document.getElementById('delete-user-from-{{$trash->id}}').submit()
                            }
                            ">delete</i>
                          </a>
                          <form id="delete-user-from-{{$trash->id}}" action="{{route('admin.users.destroy', $trash->id)}}" method="POST" style="display:none">
                            @csrf
                            @method("DELETE")
                          </form>
                        </td>
                    </tr>
                @endforeach 
          </tbody>
        </table>
         @else  
                <div class="header pb-6 d-flex align-items-center" >
                <!-- Mask -->
                <span class="mask bg-default opacity-8 mb-1"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                    <div class="col-lg-12 col-md-10 text-center">
                      <p class="text-muted mt-0  text-center mt-7 h2"><i class="fas fa-trash text-muted mr-2 display-2"></i></p>
                      <p class="text-muted mt-0  text-center h2"><small>Trash is empty !<small></p>
                    </div>
                </div>
              </div>
            @endif            
        {{$RecycleBin->appends(['users' => $users->currentPage()])->links()}}
      </div>
    </div>
  </div>
</div>
    
<!--JQuery for filter-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--First filters =>table rows-->
<script>
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
<!--Second filters =>table rows-->
<script>
  $(document).ready(function() {
    $("#Input").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#Trash tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
@endsection

