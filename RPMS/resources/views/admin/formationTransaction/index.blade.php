@extends('admin.admin_master')
@section('title', 'Formation Details')
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
            <h3 class="mb-0 float-right text-default">Formation Details</h3>
          </div>
          <a href="{{route('admin.formationTransaction.create')}}" 
            class="badge badge-pill badge-warning badge-circle badge-lg display-inline-block " 
            data-toggle="tooltip" data-placement="top" title="Click to Add Formation Stage Data">
            <i class="fas fa-plus-circle"></i>
          </a>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">Total : <span class="badge badge-sm badge-circle badge-floating badge-secondary border-white">{{$users->total()}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
      @if(count($users) > 0)
        <table class="table align-items-center text-dark table-hover">
          <thead class="bg-default text-white">
            <tr> 
              <th>S.No</th>
              <th>Name</th>
              <th>Formation Stage</th>
              <th>More Details</th>
            </tr>  
          </thead>
          <tbody class="">
             @foreach($users as $user)
                <tr class="">
                  <td>{{$users->firstItem()+$loop->index}}</td>
                  <td class="text-default font-weight-bolder" scope="col">
                    <a href="{{route('admin.formationTransaction.show', $user->pivot->user_id)}}"  
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
                    <a href="{{route('admin.formationTransaction.show', $user->pivot->user_id)}}">
                      <span class="btn btn-sm badge-pill ">{{implode(' , ',$user->formationStages()->orderBy('id')->get()->pluck('stage_name')->toArray())}}</span>
                    </a>  
                  </td>
                  <td>
                    <a href="{{route('admin.formationTransaction.show', $user->pivot->user_id)}}"   
                      class="btn-info btn-xs badge badge-pill badge-sm" 
                      data-toggle="tooltip" data-placement="top" title="Click to see more">
                      See More
                    </>              
                  </td>
                </tr>
                @endforeach 
          </tbody>  
        </table>
        {{$users->links()}}
      @else  
          <div class="header pb-6 d-flex align-items-center" >
          <!-- Mask -->
          <span class="mask bg-default opacity-8"></span>
          <!-- Header container -->
          <div class="container-fluid d-flex align-items-center">
            <div class="row">
              <div class="col-lg-12 col-md-10">
                <h3 class="display-4 text-white">Formation Details list if empty!</h3>
                <p class="text-white mt-0 mb-5">Please Enter individaul Formation stage details.</p>
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

