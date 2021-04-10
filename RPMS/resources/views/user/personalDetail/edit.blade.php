@extends('admin.admin_master')
@section('title', 'Edit personal Details')
@section('admin')
@if(Auth::user()->id == $personalDetails->user_id) 
<div class="container-fluid mt--4">
    <div class="row">
      <div class="col-xl-3 order-xl-2">
      </div>
      <div class="col-xl-9 order-xl-1">
        <div class="card">
          <div class="card-header bg-default shadow-lg">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0 text-white ml-2"><i class="fas fa-user-plus mr-2 text-info"></i>Edit Personal Details
                  </a>
                </h3>
              </div>
            </div>
            <a href="{{ route('user.personalDetail.index')}}" class="badge badge-pill badge-danger float-right mt--4"><i class="fas fa-angle-double-left"></i></i> Go back</a>
          </div>
          <div class="card-body">
              {{-- Form -> community --}}     
            @isset($personalDetails)
                <form method="POST" action="{{route('user.personalDetail.update',  $personalDetails->id)}}">
                    @endisset
                    @method('PATCH')
                    {{-- CSRF Token --}}
                    @csrf
                    <h6 class="heading-small text-muted mb-4">Update Personal Details using this form </h6>
                    <div class="pl-lg-4">
                        <div class="row">
                        <div class="col-lg-6">
                            {{-- first name field --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="father">Father's Name</label>
                                    <input type="text" name="father" id="input-first_name" class="form-control text-primary" 
                                    value="@isset($personalDetails){{$personalDetails->father}}@endisset" 
                                    @error('father') is-invalid @enderror"  
                                    value="">
                                    @error('father')
                                    <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                                {{-- middle name field --}}
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="mother">Mother's Name</label>
                                    <input type="text" name="mother" id="mother" class="form-control text-primary @error('mother') is-invalid @enderror"
                                    value="@isset($personalDetails){{$personalDetails->mother}}@endisset">
                                    @error('mother')
                                    <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                {{-- siblings filed --}}
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="siblings">Siblings</label>
                                    <input type="text" name="siblings" id="sur_name" class="form-control text-primary @error('siblings') is-invalid @enderror" 
                                value="@isset($personalDetails){{$personalDetails->siblings}}@endisset">
                                    @error('siblings')
                                    <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                                {{-- user email --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="village_town_colony">Village / Town / Colony</label>
                                    <input type="text" name="village_town_colony" id="input-username" class="form-control text-primary @error('village_town_colony') is-invalid @enderror" 
                                    value="@isset($personalDetails){{$personalDetails->village_town_colony}}@endisset">
                                    @error('village_town_colony')
                                    <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- parish --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="parish">Paish</label>
                                    <input type="text" name="parish" id="input-username" class="form-control text-primary @error('parish') is-invalid @enderror" 
                                    value="@isset($personalDetails){{$personalDetails->parish}}@endisset">
                                    @error('parish')
                                    <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- dioses --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="dioses">Dioses</label>
                                    <input type="text" name="dioses" id="input-username" class="form-control text-primary @error('dioses') is-invalid @enderror" 
                                    value="@isset($personalDetails){{$personalDetails->dioses}}@endisset">
                                    @error('dioses')
                                    <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- district --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="district_id">District</label>
                                    <select name="district_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                        @foreach($districts as $key => $district)
                                            <option {{$personalDetails->district_id == $district->id ? 'selected' : ''}} value="{{$district->id}}">{{$district->district_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('district_id'))
                                    <span class="text-danger text-small">
                                        {{ $errors->first('district_id') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- picode --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="pincode">Pincode</label>
                                    <input type="text" name="pincode" id="input-username" class="form-control text-primary @error('pincode') is-invalid @enderror" 
                                    value="@isset($personalDetails){{$personalDetails->pincode}}@endisset">
                                    @error('pincode')
                                    <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- post office --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="post_office">Post Office</label>
                                    <input type="text" name="post_office" id="input-username" class="form-control text-primary @error('post_office') is-invalid @enderror" 
                                    value="@isset($personalDetails){{$personalDetails->post_office}}@endisset">
                                    @error('post_office')
                                    <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- post box number --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="post_box_number">Post Box No.</label>
                                    <input type="text" name="post_box_number" id="input-username" class="form-control text-primary @error('post_box_number') is-invalid @enderror" 
                                    value="@isset($personalDetails){{$personalDetails->post_box_number}}@endisset">
                                    @error('post_box_number')
                                    <span class="text-danger text-small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- state --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="state_id">State</label>
                                    <select name="state_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                        @foreach($states as $key => $state)
                                            <option {{$personalDetails->state_id == $state->id ? 'selected' : ''}} value="{{$state->id}}">{{$state->state_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('state_id'))
                                    <span class="text-danger text-small">
                                        {{ $errors->first('state_id') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- country --}}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="country_id">Country</label>
                                    <select name="country_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                        @foreach($countries as $key => $country)
                                            <option {{$personalDetails->country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('country_id'))
                                    <span class="text-danger text-small">
                                        {{ $errors->first('country_id') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        
                                {{-- submit button and cancle button --}}
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                <a href="{{route('user.personalDetail.index')}}" class="btn btn-sm btn-info">Cancle</a>    
                                </div>
                        </div>
                    </div>
                
                </form>
          </div>
        </div>
      </div>
    </div>
 @endif{{--@if(Auth::user()->id == $personalDetails->user_id)  --}}  

@endsection

