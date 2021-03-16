@extends('admin.admin_master')
@section('admin')
  <div class="container-fluid mt--4">
    <div class="row">
      <div class="col-xl-3 order-xl-2">
      </div>
      <div class="col-xl-9 order-xl-1">
        <div class="card">
          <div class="card-header bg-default shadow-lg">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0 text-white ml-4"><i class="fas fa-calendar-plus mr-2 text-info"></i>Add Community 
                  </a>
                </h3>
              </div>
            </div>
            <a href="{{ route('admin.community.index')}}" class="badge badge-pill badge-danger float-right mt--4"><i class="fas fa-angle-double-left"></i></i> Go back</a>
          </div>
          <div class="card-body">
              {{-- Form -> community --}}
            <form method="POST" action="{{route('admin.community.store')}}">
                {{-- CSRF Token --}}
                @csrf
              <h6 class="heading-small text-muted mb-4">Add new community using this form </h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    {{-- name filed --}}
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Community Name</label>
                      <input type="text" name="community_name" id="input-username" class="form-control text-primary" placeholder="community name..."
                      value="{{old('community_name')}}">
                      @error('community_name')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                    {{-- mobile number Community--}}
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="mobile_number_community">Community Contact No.</label>
                      <input type="text" name="mobile_number_community" id="input-username" class="form-control text-primary" placeholder="community name..."
                      value="{{old('mobile_number_community')}}" >
                      @error('mobile_number_community')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>  
                  {{-- contact number Authority --}}
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="mobile_number_authority">Rector/Superior Contact No.</label>
                      <input type="text" name="mobile_number_authority" id="input-username" class="form-control text-primary" placeholder="community name..."
                      value="{{old('mobile_number_authority')}}" >
                      @error('mobile_number_authority')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>  
                  {{-- pincode --}}
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="pincode">Pincode</label>
                      <input type="text" name="pincode" id="input-username" class="form-control text-primary" placeholder="community name..."
                      value="{{old('pincode')}}">
                      @error('pincode')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>  
                  {{-- village/town/colony --}}
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="village_town_colony">Village / Town</label>
                      <input type="text" name="village_town_colony" id="village_town_colony" class="form-control text-primary" placeholder="community name..."
                      value="{{old('village_town_colony')}}">
                      @error('village_town_colony')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  </div> 
                  {{-- block/ sub Division --}}
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="block_subDivision">Block / Sub-Division</label>
                      <input type="text" name="block_subDivision" id="village_town_colony" class="form-control text-primary" placeholder="block / subDivision name..."
                      value="{{old('block_subDivision')}}">
                      @error('block_subDivision')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  </div> 
                  {{-- District --}}
                  <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="district_id">District</label>
                            <select name="district_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                 <option value="" selected>Choose a District</option>
                                @foreach($districts as $key => $district)
                                    <option {{old('district_id') == $district->id ? 'selected' : null}} value="{{$district->id}}">{{$district->district_name}}</option>
                                @endforeach
                            </select>
                             @if($errors->has('district_id'))
                            <span class="text-danger text-small">
                                {{ $errors->first('district_id') }}
                            </span>
                            @endif
                        </div>
                    </div>
                  <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="state_id">State</label>
                            <select name="state_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                <option value="" selected>Choose a State</option>
                                @foreach($states as $key => $state)
                                    <option {{old('state_id') == $state->id ? 'selected' : null}} value="{{$state->id}}">{{$state->state_name}}</option>
                                @endforeach
                            </select>
                             @if($errors->has('state_id'))
                            <span class="text-danger text-small">
                                {{ $errors->first('state_id') }}
                            </span>
                            @endif
                        </div>
                    </div>
                 <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="country_id">Country</label>
                            <select name="country_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                <option value="" selected>Choose a Country</option>
                                @foreach($countries as $key => $country)
                                    <option {{old('country_id') == $country->id ? 'selected' : null}} value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country_id'))
                            <span class="text-danger text-small">
                                {{ $errors->first('country_id') }}
                            </span>
                            @endif
                        </div>
                    </div>

                  {{-- Address community --}}
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="addressline">Address</label>
                      <textarea rows="4" class="form-control text-primary" name="addressline" placeholder="A few words about you ..."
                      value="{{old('addressline')}}">
                      </textarea>
                      @error('addressline')
                        <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                    {{-- submit button and cancle button --}}
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        <a href="{{route('admin.community.index')}}" class="btn btn-sm btn-info">Cancle</a>                   
                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection

