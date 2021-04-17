@extends('admin.admin_master')
@section('admin')
@php
//TOtal users
  $users = DB::table('users')->get();

  //Current addmission
   $currentYearAdmissions =  DB::table('users')->whereYear('entry_date_sj', Carbon\Carbon::now()->year)
                        ->select('entry_date_sj')                    
                        ->get();
  //All Priests 
  $priests =  DB::table('event_transactions')->where('event_id', '2')
                        ->select('event_id')                    
                        ->get();
  //diconate 
  $deacon =  DB::table('event_transactions')->where(function ($query) {
                          $query->where('event_id', '1')
                          ->where('held_on', 'like', '%'.Carbon\Carbon::now()->year.'%')
                          ->get();
                          });
$scholastics = ($users->count() - ($priests->count() + $deacon->count()));

                       
  //Total communities
  $community = DB::table('community')->get();

@endphp
@can('is-admin') 
{{-- First row of cards --}}
<div class="pt-4">
  <div class="row">
    <!-- Total Users-->
    <div class="col-xl-4 col-md-6">
      <a href="{{route('admin.users.index')}}">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Members </h5>
                <span class="h2 font-weight-bold mb-0">{{$users->count()}}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                  <i class="fas fa-users"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm mt-6">
              <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
              <span class="text-nowrap h4">Total Member</span>
            </p>
          </div>
        </div>
      </a>
    </div>
    <!-- "Total communities" -->
    <div class="col-xl-4 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Communities</h5>
                <span class="h2 font-weight-bold mb-0">{{$community->count()}}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                <i class="fas fa-hotel"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm mt-6">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
            <span class=" h4 text-nowrap">Total Communities</span>
          </p>
        </div>
      </div>
    </div>
    <!--Current year admission-->
    <div class="col-xl-4 col-md-6">
      <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">New Admissions</h5>
              <span class="h2 font-weight-bold mb-0">{{$currentYearAdmissions->count()}}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                <i class="fas fa-calendar-check"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm mt-6">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
            <span class="text-nowrap h4">New Admissions this year (<span class="text-danger">{{Carbon\Carbon::now()->year}}</span>)</span>
          </p>
        </div>
      </div>
    </div>
  </div>  
</div>  
{{-- second row of cards --}}
<div class="">
  <div class="row">
    <!-- Total Priests-->
    <div class="col-xl-4 col-md-6">
      <a href="{{route('admin.users.index')}}">
        <div class="card card-stats">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Total Priests </h5>
                <span class="h2 font-weight-bold mb-0">{{$priests->count()}}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                  <i class="fas fa-pray"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm mt-6">
              <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
              <span class="text-nowrap h4">Total Priests in the Province</span>
            </p>
          </div>
        </div>
      </a>
    </div>
    <!-- "Total Number of Deacons" -->
    <div class="col-xl-4 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Deacon</h5>
                <span class="h2 font-weight-bold mb-0">{{$deacon->count()}}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                <i class="fas fa-crosshairs"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm mt-6">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
            <span class=" h4 text-nowrap">Total Number of Deacons in (<span class="text-danger">{{Carbon\Carbon::now()->year}}</span>)</span>
          </p>
        </div>
      </div>
    </div>
    <!--Total Scholastics-->
    <div class="col-xl-4 col-md-6">
      <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total Scholastics</h5>
              <span class="h2 font-weight-bold mb-0">{{$scholastics}}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
               <i class="fas fa-street-view"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm mt-6">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
            <span class="text-nowrap h4">Total Number of scholastics</span>
          </p>
        </div>
      </div>
    </div>
  </div>  
</div>  
@endcan    
@endsection
