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
                <h3 class="mb-0 text-white ml-4"><i class="fas fa-calendar-plus mr-2 text-info"></i>Edit  Community Data 
                  </a>
                </h3>
              </div>
            </div>
            <a href="{{ route('admin.community.index')}}" class="badge badge-pill badge-danger float-right mt--4"><i class="fas fa-angle-double-left"></i></i> Go back</a>
          </div>
          <div class="card-body">
              {{-- Form -> community --}}
            <form method="POST" action="{{route('admin.community.update', $communities->id)}}">
              @method('PATCH')
                {{-- CSRF Token --}}
                @csrf
              <h6 class="heading-small text-muted mb-4">Edit community data using this form </h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    {{-- name filed --}}
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Community Name</label>
                      <input type="text" name="community_name" id="input-username" class="form-control text-primary" placeholder="community name..."
                      value="@isset($communities){{$communities->community_name}}@endisset">
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
                      value="@isset($communities){{$communities->mobile_number_community}}@endisset">
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
                      value="@isset($communities){{$communities->mobile_number_authority}}@endisset">
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
                      value="@isset($communities){{$communities->pincode}}@endisset">
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
                      value="@isset($communities){{$communities->village_town_colony}}@endisset">
                      @error('village_town_colony')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  </div> 
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="block_subDivision">Block / Sub-Division</label>
                      <input type="text" name="block_subDivision" id="village_town_colony" class="form-control text-primary" placeholder="block / subDivision name..."
                      value="@isset($communities){{$communities->block_subDivision}}@endisset">
                      @error('block_subDivision')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>  
                  <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="district_id">District</label>
                            <select name="district_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                @foreach($districts as $key => $district)
                                    <option {{$communities->district_id == $district->id ? 'selected' : ''}} value="{{$district->id}}">{{$district->district_name}}</option>
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
                            <label class="form-control-label" for="district_id">State</label>
                            <select name="state_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                @foreach($states as $key => $state)
                                    <option {{$communities->state_id == $state->id ? 'selected' : ''}} value="{{$state->id}}">{{$state->state_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('state_id'))
                            <span class="text-danger text-small">
                                {{ $errors->first('district_id') }}
                            </span>
                            @endif
                        </div>
                  </div>  
                 <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="country_id">Country</label>
                            <select name="country_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                @foreach($countries as $key => $country)
                                    <option {{$communities->country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country_id'))
                            <span class="text-danger text-small">
                                {{ $errors->first('district_id') }}
                            </span>
                            @endif
                        </div>
                  </div>  
                  {{-- Address community --}}
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="addressline">Address</label>
                      <textarea rows="4" class="form-control text-primary" name="addressline" placeholder="A few words about you ..."
                      value="">@isset($communities){{$communities->addressline}}@endisset
                      </textarea>
                      @error('addressline')
                        <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                    {{-- submit button and cancle button --}}
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        <a href="{{route('admin.community.index')}}" class="btn btn-sm btn-info">Cancle</a>  
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection

