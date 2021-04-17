@extends('admin.admin_master')
@section('title', 'All Departed')
@section('admin')
{{-- User Trash list --}}
<div class="row mt--5">
  <div class="col-xl-12 p-4">
    <div class="card">
      <div class="card-header border-0 bg-dark">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0 float-right text-white font-weight-bolder">List of Departed users of the year <span class="text-warning font-weight-bolder"> {{Carbon\Carbon::now()->year}}</span> 
                 <span class="badge badge-sm badge-circle  badge-secondary border-white">{{$currentYearDepartedUsers->total()}}</span>
            </h3>
          </div>
          <div class="col text-right">
          </div>
        </div>
      </div>
      <div class="table-responsive ">
         @if(count($currentYearDepartedUsers) > 0)
        <!-- Projects table -->
        <table class="table align-items-center table-hover mb-3">
          <thead class="thead-light font-weight-bolder">
            <tr>
              <th scope="col">S.No</th>
              <th scope="col">First Name</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Roles</th>
              <th scope="col">Departure Date</th>
            </tr>
          </thead>
          <tbody class="" id="myTable">
                @foreach ($currentYearDepartedUsers as $currentYearDepartedUser)
                    <tr>
                        <td>{{$currentYearDepartedUsers->firstItem()+$loop->index}}</td>
                        <td>{{$currentYearDepartedUser->first_name}}</td>
                        <td>{{$currentYearDepartedUser->middle_name}}</td>
                        <td>{{$currentYearDepartedUser->sur_name}}</td>
                        <td>{{$currentYearDepartedUser->email}}</td>
                        <td>{{implode(', ', $currentYearDepartedUser  ->roles()->get()->pluck('role_name')->toArray())}}</td>
                        <td>{{Carbon\Carbon::parse($currentYearDepartedUser->deleted_at)->format('d-F-Y')}}</td>
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
                    <div class="col-lg-12 col-md-10 text-center mt-5">
                      <p><i class="fas fa-dharmachakra display-1"></i></p>
                      <p class="text-muted mt-0  text-center h2"><small>No Records found!<small></p>
                    </div>
                </div>
              </div>
            @endif            
        {{$currentYearDepartedUsers->links()}}
      </div>
    </div>
  </div>  
</div>

<!--JQuery for filter-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--filters =>table rows-->
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
@endsection