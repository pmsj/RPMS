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
            <h3 class="mb-0 float-right text-white">Admission Report for <i class="fas fa-angle-double-right"></i> <span class="font-weight-bolder">{{Carbon\Carbon::now()->year}}</span></h3>
          </div>
          <div class="col text-right">
            <a href="#!" class="btn-primary badge badge-sm badge-pill">Total : <span class="badge badge-sm badge-circle badge-floating badge-secondary border-white">{{$currentYearAdmissions->total()}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
        @if(count($currentYearAdmissions) > 0)
        <table class="table align-items-center table-hover mb-3">
          <thead class="thead-light font-weight-bolder text-center">
            <tr>
              {{-- <th scope="col">No.</th> --}}
              <th scope="col">S.No</th>
              <th scope="col">First Name</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Year of Admission</th>
            </tr>
          </thead>
          <tbody class="text-center">
                @foreach ($currentYearAdmissions as $user)
                    <tr>
                        <td>{{$currentYearAdmissions->firstItem()+$loop->index}}</td>
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
                <span class="mask bg-default opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                  <div class="row">
                    <div class="col-lg-12 col-md-10 mt-4">
                      <h1 class="display-4 text-white">Sorry ! </span> No detials found for the current year admission </h1>
                      <p class="text-white mt-0 mb-5">No Novice admitted in this year.</p>
                    </div>
                  </div>
                </div>
              </div>
             @endif 
        </table>
        {{$currentYearAdmissions->links()}}
      </div>
    </div>
  </div>
</div>
    
@endsection

