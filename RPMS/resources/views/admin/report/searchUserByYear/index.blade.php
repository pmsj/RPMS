@extends('admin.admin_master')
@section('title', 'Admission Report')
@section('admin')
          <!-- Search form -->
        <div class="container mt-4">  
          <div class="card">
            <div class="card-header bg-danger">
              <strong class="text-white">Search User By 
              <span class="text-uppercase btn btn-sm btn-pill badge badge-pill badge-white text-muted font-weight-bolder">
              <span class="text-dark">Admission Year </span>/<span class="text-primary"> First Name </span>/<span class="text-warning"> Sur Name </span>/<span class="text-info"> email</span></strong>
              </span>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <form action="{{route('admin.searchUserByYear')}}" class="navbar-search-light">
                    <div class="form-group mt-4 ml-4 mb-4">
                      <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input name="query" class="form-control text-muted" placeholder="type here to search..." type="text">
                        <span>
                          <button type="submit" class="btn btn-md rounded btn-danger badge-danger border-white">
                            search 
                        </button>
                      </span>
                      </div>
                       @error('query')
                          <span class="text-danger text-small"><small>{{ $message }}</small></span>
                          @enderror
                  </form>
                </div> 
              </div>
          </div>  
        </div> 
        {{-- search for Ordained priest--}}
@endsection