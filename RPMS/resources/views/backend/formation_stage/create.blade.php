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
                <h3 class="mb-0 text-white"><i class="fas fa-calendar-plus mr-2 text-info"></i>Add Formation Stage</h3>
              </div>
            </div>
            <a href="{{ route('admin.formationStage.index')}}" class="badge badge-pill badge-danger float-right mt--4"><i class="fas fa-angle-double-left"></i></i> Go back</a>
          </div>
          <div class="card-body">
              {{-- Form -> formation_stage--}}
            <form method="POST" action="{{route('admin.formationStage.store')}}" enctype="multipart/form-data">
                {{-- CSRF Token --}}
                @csrf
              <h6 class="heading-small text-muted mb-4">Add new formation stage using this form </h6>
              <div class="pl-lg-4">
                <div class="row">
                  {{-- name Formation_stage --}}
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Formation Stag Name</label>
                      <input type="text" name="stage_name" id="input-username" class="form-control text-primary" placeholder="formation stage name..." >
                      @error('stage_name')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Formation Stage Description</label>
                      <textarea rows="4" class="form-control text-primary" name="stage_description" value="{{old('stage_description')}}"></textarea>
                      @error('stage_description')
                        <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                  {{-- </div> --}}
                      {{-- Duration Formation stage --}}
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Formation Stage Duration</label>
                        <input type="text" name="stage_duration" id="input-username" class="form-control text-primary" placeholder="formation stage duration..." >
                        @error('stage_duration')
                        <span class="text-danger text-small">{{ $message }}</span>
                        @enderror
                      </div>
                    {{-- submit button and cancle button --}}
                        <button type="submit" class="btn btn-sm btn-primary">Add</button>
                        <a href="{{route('admin.formationStage.index')}}" class="btn btn-sm btn-info">Cancel</a>                   
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

