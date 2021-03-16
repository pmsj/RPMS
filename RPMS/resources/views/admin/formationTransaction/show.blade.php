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
                <span class="font-weigth-bolder text-info text-uppercase">
                    {{$user->first_name}} {{$user->sur_name}}'s 
                </span> 
                <span class="text-warning">
                <i class="fas fa-angle-double-right"></i>
                </span>   
                  <span class="h4">
                    Formation Details
                  </span>
                  <small class="text-muted">
                     ({{$user->id}})
                    </small>
            </h4>
          </div>
          <div class="col text-right">
            <a href="{{route('admin.formationTransaction.index')}}" class="badge badge-pill badge-danger"><i class="fas fa-angle-double-left"></i><strong class=""> Go back</strong></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
      @if(!is_null($user))
        <table class="table align-items-center text-white table-hover">
          <thead class="text-center bg-default m-0 p-0">
            <tr>  
              <th>Formation Stage</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Concerned Authority</th>
              <th>Community</th>
            </tr>  
          </thead>
          <tbody>
            @forelse ( $user->formationStages as $formationStage )
                <tr class="text-center text-default">
                  <td class="text-default font-weight-bolder" scope="col">{{$formationStage->stage_name}}</td>
                  <td>{{ \Carbon\Carbon::parse($formationStage->pivot->start_date)->format('d-m-Y')}}</td>
                  <td>{{ \Carbon\Carbon::parse($formationStage->pivot->end_date)->format('d-m-Y')}}</td>
                  <td>{{$formationStage->pivot->concerned_authority}}</td>
                  <td>{{$formationStage->pivot->community_id}}</td>
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

