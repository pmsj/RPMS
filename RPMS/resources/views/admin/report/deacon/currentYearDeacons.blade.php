@extends('admin.admin_master')
@section('title', 'Events')
@section('admin')
{{-- table row --}}
<div class="row mt--5">
  <div class="col-xl-1">
  </div>
@isset($users) 
  <div class="col-xl-10 pl-0 pr-0 m-0">
    <div class="card">
      <div class="card-header border-0 bg-secondary">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0 float-right text-default">List of Deacons Ordained in the year<span class="text-warning font-weight-bolder"> {{Carbon\Carbon::now()->year}}</span></h3>
          </div>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">Total : <span class="badge badge-sm badge-circle badge-floating badge-secondary border-white">{{$users->count()}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
      @if(count($users) > 0)
        <table class="table align-items-center text-dark table-hover">
          <thead class="bg-default text-white">
            <tr>  
              <th>Name</th>
              <th>Event Name</th>
              <th>Date of Diaconate</th>
              <th>Place of Diconate</th>
              <th>community</th>
            </tr>  
          </thead>
          <tbody>
             @foreach($users as $user)

                <tr class="">
                  <td class="text-default font-weight-bolder" scope="col">
                    <a href="{{route('admin.eventTransaction.show', $user->pivot->user_id)}}"  
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
                    <a href="{{route('admin.eventTransaction.show', $user->pivot->user_id)}}">
                      <span class="btn btn-sm badge-pill ">{{implode(' , ',$user->events()->where('event_id','1')->get()->pluck('event_name')->toArray())}}</span>
                    </a>  
                  </td>
                  <td>
                    {{ \Carbon\Carbon::parse($user->pivot->held_on)->format('d-M-Y')}}      
                  </td>
                  <td>
                    {{ $user->pivot->place}}      
                  </td>
                  <td>
                    {{$user->communities->pluck('community_name')->first()}}</td>      
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
                <div class="col-lg-12 col-md-10 text-center mt-5">
                    <p><i class="fas fa-dharmachakra display-1"></i></p>
                    <p class="text-muted mt-0  text-center h2"><small>No Records found!<small></p>
                    <p class="text-secondary">list of current year deacons is empty !</p>
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

