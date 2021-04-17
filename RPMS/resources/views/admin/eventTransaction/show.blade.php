@extends('admin.admin_master')
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
                      Priest's Event Details
                  </small>
                    <small class="text-muted">
                      (id-{{$user->id}})
                    </small>
                </span> 
            </h4>
          </div>
          <div class="col text-right">
            <a href="{{route('admin.eventTransaction.index')}}" class="badge badge-pill badge-danger"><i class="fas fa-angle-double-left"></i><strong class=""> Go back</strong></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
      @if(!is_null($user))
        <table class="table align-items-center text-white table-hover">
          <thead class="text-center bg-default m-0 p-0">
            <tr>  
              <th>Event</th>
              <th>Held On</th>
              <th>Presided Over By</th>
              <th>Community</th>
              <th>Place</th>
            </tr>  
          </thead>
          <tbody>
            @forelse ( $user->events as $event )
                <tr class="text-center text-default">
                  <td class="text-default font-weight-bolder" scope="col">
                    <a href="{{route('admin.eventTransaction.edit', $event->pivot->user_id)}}" 
                        class="text-default btn btn-md badge badge-pill text-dark font-weight-bolder"
                        data-toggle="tooltip" data-placement="right" title="Click to Edit Details">
                      {{$event->event_name}}
                    </a>
                    <br class="">
                    <small class="m-0 p-0"><span class="text-info">Created on</span> {{\Carbon\Carbon::parse($event->pivot->created_at)->format('d-F-Y')}}</small>
                  <small><span class="text-info">Updated on</span> {{\Carbon\Carbon::parse($event->pivot->updated_at)->format('d-F-Y')}}</small>
                  </td>
                  <td>{{ \Carbon\Carbon::parse($event->pivot->held_on)->format('d-F-Y')}}</td>
                  <td>{{$event->pivot->presided_over_by}}</td>
                  <td>{{$event->communities->pluck('community_name')->first()}}</td> 
                  <td>{{$event->pivot->place}}</td>
                </tr>
          </tbody>  
            @empty
            <div class="bg-danger item-align-center ">
              <h3 class="text-white text-center font-weight-bolder">No Formation stages added yet.</h3>
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
                <h3 class="display-4 text-white">Formation Details list if empty!</h3>
                <p class="text-white mt-0 mb-5">Please Enter some Formation details.</p>
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

