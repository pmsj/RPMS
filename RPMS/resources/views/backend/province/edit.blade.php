{{-- edit functionalities has some isssues// abbreviation is not updating --}}
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
                <h3 class="mb-0 text-white">Edit Province Data</h3>
              </div>
            </div>
            <a href="{{ route('admin.province.index')}}" class="badge badge-pill badge-danger float-right mt--4"><i class="fas fa-angle-double-left"></i></i> Go back</a>
          </div>
          <div class="card-body">
              {{-- Form -> province --}}
            <form method="POST" action="{{route('admin.province.update', $province_data->id)}}">
                {{-- CSRF Token --}}
                @method('PATCH')
                @csrf
              <h6 class="heading-small text-muted mb-4">Edit existing province name using this form </h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Province Name</label>
                      <input type="text" name="province_name" value="{{$province_data->province_name}}" id="input-username" class="form-control text-  " >
                      @error('province_name')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Abbreviations</label>
                        <input type="text" name="province_abbreviation" value="{{$province_data->province_abbreviation}}" id="input-username" class="form-control text-  " >
                        @error('province_abbreviation')
                        <span class="text-danger text-small">{{ $message }}</span>
                        @enderror
                      </div>
                    {{-- submit button and cancle button --}}
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        <a href="{{route('admin.province.index')}}" class="btn btn-sm btn-info">Cancel</a>                   
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

