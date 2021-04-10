@extends('admin.admin_master')
@section('title', 'Admission Report')
@section('admin')
          <!-- Search form -->
        <div class="container mt-4">  
          <div class="card">
            <div class="card-header bg-danger">
              <strong class="text-white">Enter the year to find User Admission by year</strong>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <form action="{{route('admin.searchUser')}}" class="navbar-search-light">
                    <div class="form-group mt-4 ml-4 mb-4">
                      <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input name="query" class="form-control" placeholder="Enter any year..." type="text">
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