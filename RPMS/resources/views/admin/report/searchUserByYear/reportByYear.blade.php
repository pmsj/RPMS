@extends('admin.admin_master')
@section('title', 'Admission By Year')
@section('admin')
{{-- table row --}}
<div class="row mt--5">
  <div class="col-xl-12 p-4">
    <div class="card">
      <div class="card-header border-0 bg-danger">
        <div class="row align-items-center">
          <div class="col">
            <a href="{{route('admin.search')}}" class=" btn-default btn-sm badge badge-pill  display-inline-block"><i class="fas fa-angle-double-left"></i> Back</a>
            <h3 class="mb-0 float-right text-white">Search Result for  <i class="fas fa-angle-double-right"></i> <span class="font-weight-bolder">{{$year}}</span></h3>
          </div>
          <div class="col text-right">
            <a href="#!" class="btn-primary badge badge-sm badge-pill">Total : <span class="badge badge-sm badge-circle badge-floating badge-secondary border-white">{{count( $users)}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
        @if(count($users) > 0)
        <table class="table align-items-center table-hover mb-3">
          <thead class="thead-light font-weight-bolder text-center">
            <tr>
              {{-- <th scope="col">No.</th> --}}
              <th scope="col">User Id</th>
              <th scope="col">First Name</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Year of Admission</th>
            </tr>
          </thead>
          <tbody class="text-center">
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->middle_name}}</td>
                        <td>{{$user->sur_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ \Carbon\Carbon::parse($user->entry_date_sj)->format('Y')}} </td> 
                    </tr>
                @endforeach            
          </tbody>
          @else  
                 <div class="header pb-6 d-flex align-items-center" >
                <!-- Mask -->
                <span class="mask bg-default opacity-8 mb-1"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                    <div class="col-lg-12 col-md-10 text-center mt-5">
                      <p><i class="fas fa-dharmachakra display-1"></i></p>
                      <p class="text-muted mt-0  text-center h2"><small> Sorry ! No Records found!<small></p>
                    </div>
                </div>
              </div>
             @endif 
        </table>
        {{$users->links()}}
      </div>
    </div>
  </div>
</div>
    
@endsection

