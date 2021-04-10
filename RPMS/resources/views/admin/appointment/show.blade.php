@extends('admin.admin_master')
@section('title', 'Indivisual Appointments')
@section('admin')
{{-- table row --}}
<div class="row mt--5">
  
  <div class="col-xl-12 pl-0 pr-0">
    <div class="card">
      <div class="card-header border-0 bg-secondary">
        <div class="row align-items-center">
          <div class="col">
            <h4 class="mb-0 text-default">
                <span class="font-weigth-bolder text-info text-uppercase btn btn-sm btn-pill badge badge-pill badge-white text-primary">
                    {{$user->first_name}} {{$user->sur_name}}'s 
                  <span class="text-warning">
                      <i class="fas fa-angle-double-right"></i>
                  </span>   
                  <small class="font-weight-bolder text-dark">
                      Appointmenst list
                  </small>
                    <small class="text-muted">
                      (id-{{$user->id}})
                    </small>
                </span> 
            </h4>
          </div>
          <div class="col text-right">
            <a href="{{route('admin.appointment.index')}}" class="badge badge-pill badge-danger"><i class="fas fa-angle-double-left"></i><strong class=""> Go back</strong></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
      @if(!is_null($user))
        <table class="table align-items-center text-white table-hover">
          <thead class="text-center bg-default m-0 p-0">
            <tr>  
              <th>Ministry</th>
              <th>Designation</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Any Comment</th>
              <th>Community</th>
              <th>Community Phone No</th>
            </tr>  
          </thead>
          <tbody>
            @forelse ( $user->designations as $designation )
                <tr class="text-center text-default">
                  <td>
                    <strong>  
                    {{$designation->pivot->ministry}}
                    </strong>
                    <br class="">
                    <small class="m-0 p-0"><span class="text-info">Created on</span> {{\Carbon\Carbon::parse($designation->pivot->created_at)->format('d-F-Y')}}</small>
                  <small><span class="text-info">Updated on</span> {{\Carbon\Carbon::parse($designation->pivot->updated_at)->format('d-F-Y')}}</small>
                  </td>
                  <td class="text-default font-weight-bolder" scope="col">
                    <a href="{{route('admin.appointment.edit', $designation->pivot->user_id)}}" 
                      class="text-default btn btn-sm badge badge-pill text-dark font-weight-bolder"
                      data-toggle="tooltip" data-placement="right" title="Click to Edit Details">
                      {{$designation->designation_name}}
                    </a>
                  </td>
                  <td>{{ \Carbon\Carbon::parse($designation->pivot->start_date)->format('d-F-Y')}}</td>
                  <td>{{ \Carbon\Carbon::parse($designation->pivot->end_date)->format('d-F-Y')}}</td>
                  <td>{{$designation->pivot->comment}}</td>
                  <td>
                      <a href="{{route('admin.community.index')}}" 
                      data-toggle="tooltip" data-placement="left" title="Click to see more details about community" class="btn btn-sm badge badge-pill">
                      {{$designation->communities->pluck('community_name')->first()}}
                      </a>
                    </td> 
                  <td>{{$designation->communities->pluck('mobile_number_community')->first()}}</td>
                </tr>
          </tbody>  
            @empty
            <div class="bg-danger item-align-center ">
              <h3 class="text-white text-center font-weight-bolder"> No appointments found for 
                <span class="text-default">  
                    <i class="fas fa-sign-in-alt text-secondary"></i>
                    {{$user->first_name}} {{$user->sur_name}}.</h3>
                </span>
            </div>  
            @endforelse
             {{-- @endfor --}}
        </table>
      @else  
          <div class="header pb-6 d-flex align-items-center" >
          <!-- Mask -->
          <span class="mask bg-default opacity-8"></span>
          <!-- Header container -->
          <div class="container-fluid d-flex align-items-center">
            <div class="row">
              <div class="col-lg-12 col-md-10">
                <h3 class="display-4 text-white">Appointment Details list if empty!</h3>
                <p class="text-white mt-0 mb-5">Please Enter Appointment details.</p>
              </div>
            </div>
          </div>
        </div>
       @endif    
      </div>
    </div>
  </div>
</div>
    
@endsection

