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
                <h3 class="mb-0 text-white"><i class="fas fa-calendar-plus mr-2 text-info"></i>Add Ministry Data</h3>
              </div>
            </div>
            <a href="{{ route('admin.ministry.index')}}" class="badge badge-pill badge-danger float-right mt--4"><i class="fas fa-angle-double-left"></i></i> Go back</a>  
          </div>
          <div class="card-body">
              {{-- Form -> ministry --}}
            <form method="POST" action="{{route('admin.ministry.store')}}">
                {{-- CSRF Token --}}
                @csrf
              <h6 class="heading-small text-muted mb-4">Add new ministry using this form </h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Ministry Name</label>
                      <input type="text" name="ministry_name" id="input-username" class="form-control" placeholder="ministry name..." >
                      @error('ministry_name')
                      <span class="text-danger text-small">{{ $message }}</span>
                      @enderror
                    </div>
                    {{-- submit button and cancle button --}}
                        <button type="submit" class="btn btn-sm btn-primary">Add</button>
                        <a href="{{route('admin.ministry.index')}}" class="btn btn-sm btn-info">Cancle</a>                   
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

