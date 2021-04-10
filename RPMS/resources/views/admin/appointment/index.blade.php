@extends('admin.admin_master')
@section('title', 'All Appointments')
@section('admin')
{{-- table row --}}
<div class="row mt--5">
  <div class="col-xl-1">
  </div>
@isset($users) <!--check $formationStages is set ir not-->
  <div class="col-xl-10 pl-0 pr-0 m-0">
    <div class="card">
      <div class="card-header border-0 bg-secondary">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0 float-right text-default">Appointment Details</h3>
          </div>
          <a href="{{route('admin.appointment.create')}}" 
            class="badge badge-pill badge-warning badge-circle badge-lg display-inline-block " 
            data-toggle="tooltip" data-placement="top" title="Click to Make New Appointment">
            <i class="fas fa-plus-circle"></i>
          </a>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">Total : <span class="badge badge-md badge-circle badge-floating badge-secondary border-white">{{count($users)}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
      @if(count($users) > 0)
        <table class="table align-items-center text-dark table-hover">
          <thead class="text-center bg-default text-white">
            <tr>  
              <th>Name</th>
              <th>Designaiton</th>
              <th>More details</th>
            </tr>  
          </thead>
          <tbody>
             @foreach($users as $user)
                <tr class="text-center">
                  <td class="text-default font-weight-bolder" scope="col">
                    <a href="{{route('admin.appointment.show', $user->pivot->user_id)}}"  
                      data-toggle="tooltip" data-placement="top" title="Click to see more"
                      class="btn btn-md badge badge-pill text-dark font-weight-bolder">
                      {{$user->first_name." ".$user->sur_name}}
                   
                    <small class="font-weight-bold">
                      <span class="text-muted">
                        (
                        {{ \Carbon\Carbon::parse($user->entry_date_sj)->format('Y')}}th Batch
                        )
                      </span>
                    </small>
                     </a>
                  </td>
                  <td>
                    <a href="{{route('admin.appointment.show', $user->pivot->user_id)}}">
                      <span class="btn btn-sm badge-pill text-primary font-weight-bolder">{{implode(' , ',$user->designations()->orderBy('id')->get()->pluck('designation_abbreviation')->toArray())}}</span>
                    </a>  
                  </td>    
                  <td>
                    <a href="{{route('admin.appointment.show', $user->pivot->user_id)}}"   
                      class="btn-info btn-xs badge badge-pill badge-sm" 
                      data-toggle="tooltip" data-placement="top" title="Click to see more">
                      See More
                    </a>              
                  </td>
                </tr>
              @endforeach 
          </tbody>  
        </table>
      @else  
          <div class="header pb-6 d-flex align-items-center" >
          <!-- Mask -->
          <span class="mask bg-default opacity-8"></span>
          <!-- Header container -->
          <div class="container-fluid d-flex align-items-center">
            <div class="row">
              <div class="col-lg-12 col-md-10">
                <h3 class="display-4 text-white">Appointment list if empty!</h3>
                <p class="text-white mt-0 mb-5">Please Enter Appointment details.</p>
              </div>
            </div>
          </div>
        </div>
       @endif    
      </div>
    </div>
  </div>
@endisset  
  <div class="col-xl-1">
  </div>
</div>
    
@endsection

