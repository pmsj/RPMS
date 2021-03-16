@extends('admin.admin_master')
@section('admin')
<div class="main-content" id="panel">  
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask --> 
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-12 col-md-10">
            <h6 class="display-2 text-white mb-5">
              <span class="text-yellow display-3 font-weight-bold ">
              Hello !
            </span> {{Auth::user()->first_name}} {{Auth::user()->sur_name}}
            </h6>
            <p class="text-white mt-0 mb-5">
              This is your profile page.<br> You can <strong>view</strong> and <strong>update</strong> | Name | Email | Password | Profile
            </p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Page content -->
    <div class="container-fluid mt--8">
  @isset(Auth::user()->personalDetail)
  <div class="row">
<!---User card with pic-->
    <div class="container-fluid mt--5">
      <div class="row">
        {{-- image upload --}}
         @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
         
         @endif
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src="{{asset('backend1/assets/img/brand/ran_circle.png')}}" class="rounded-circle">
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                  <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                  <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      <div>
                        <span class="heading">22</span>
                        <span class="description">Friends</span>
                      </div>
                      <div>
                        <span class="heading">10</span>
                        <span class="description">Photos</span>
                      </div>
                      <div>
                        <span class="heading">89</span>
                        <span class="description">Comments</span>
                      </div>
                    </div>
                  </div>
                </div>
              {{-- User Card and pictrure --}}
                <div class="text-center">
                  <h3>
                    {{Auth::user()->first_name}} {{Auth::user()->sur_name}}<span class="font-weight-light">, <strong class="text-info">{{Auth::user()->getAge()}}</strong></span>
                  </h3>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i>
                      <strong>
                      {{Auth::user()->personalDetail->village_town_colony}}, 
                      {{Auth::user()->personalDetail->parish}},
                      {{Auth::user()->personalDetail->district->district_name}} 
                    </strong>
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>
                    <strong class="text-primary">Roles:</strong>
                    <a href="#" class="badge badge-pill badge-warning">
                    <i class="fas fa-user-tag"></i>
                    <strong class="text-gradient-default" title="Roles">
                    {{implode(', ', Auth::user()->roles()->get()->pluck('role_name')->toArray())}}
                    </strong>
                </a>
                  </div>
                  <div>
                    <i class="ni education_hat mr-2"></i>
                  </div>
                  <hr class="my-3" />
                    <div class="">
                      <span class="h3 text-muted">
                        Ranchi Jesuit Province
                      </span>  
                    </div>  
                </div>
              </div>
            </div>
          </div>
  @endisset
  {{-- Form user profile infromation--}}
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header bg-gradient-warning">
              <div class="row align-items-center">
                <div class="col-8">
                  <p class="mb-0 font-weight-bold text-white"><i class="far fa-id-card mr-3 text-white h4 "></i>{{Auth::user()->first_name}}'s profile </p>
                </div>
              </div>
            </div>
          <div class="card-body">

              <form method="POST" action="{{route('user-profile-information.update')}}">
                @csrf
                @method('put')
                <h6 class="heading-small text-default mb-4"><i class="fas fa-user-edit h2 mr-2"></i> Edit User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">First Name</label>
                        <input type="text" name="first_name" id="input-username" class="form-control text-primary @error('first_name') is-invalid @enderror" placeholder="first name..." 
                        value="{{auth()->user()->first_name}}">
                        @error('first_name')
                        <span class="text-danger text-small">{{ $message }}</span>
                       @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Middle Name</label>
                        <input type="text" name="middle_name" id="input-username" class="form-control text-primary @error('middle_name') is-invalid @enderror" placeholder="middle_name ..." 
                        value="{{auth()->user()->middle_name}}">
                        @error('middle_name')
                        <span class="text-danger text-small">{{ $message }}</span>
                       @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Sur Name</label>
                        <input type="text" name="sur_name" id="input-sur_name" class="form-control text-primary @error('sur_name') is-invalid @enderror" placeholder="sur_name ..." 
                        value="{{auth()->user()->sur_name}}">
                        @error('sur_name')
                        <span class="text-danger text-small">{{ $message }}</span>
                       @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="text" name="email" id="input-username" class="form-control text-primary @error('email') is-invalid @enderror" placeholder="email..." 
                        value="{{auth()->user()->email}}">
                        @error('email')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                      </div>
                    </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-sm btn-primary">Update Profile</button>
                      </div>
                  </div>
                  <hr class="my-4" />
                </div>
              
              </form>
   {{-- Update Password --}}
            <form method="POST"  action="{{route('user-password.update')}}">
                @csrf
                @method('put')
                <h6 class="heading-small text-default mb-4"><i class="fas fa-key mr-3 h2"></i>Update Password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">  
                      <div class="form-group">
                        <label class="form-control-label" for="current_password" >Current Password</label>
                        <input type="password" name="current_password"  id="current_password" class="form-control text-muted" placeholder="current password..."  
                        @error('current_password') is-invalid @enderror >
                        @error('current_password')
                        <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                      </div>
                  </div>  
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="password">New Password</label>
                        <input type="password" name="password"  id="password" class="form-control text-muted" placeholder="New password...">
                        @error('password')
                        <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation"  id="password_confirmation" class="form-control text-muted" placeholder="password_confirmation...">
                        @error('password_confirmation')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                      </div>
                    </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-sm btn-primary">Update Password</button>
                      </div>
                  </div>
                </div>
            </form>
          </div>             
      </div>
@endsection