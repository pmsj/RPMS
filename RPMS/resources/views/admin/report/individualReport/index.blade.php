@extends('admin.admin_master')
@section('title', 'Admission Report')
@section('admin')
          <!-- Search form -->
        <div class="container col-lg-9 mt-4">  
          <div class="card">
            <div class="card-header bg-danger mb-4">
              <strong class="text-white h2 font-weight-bolder">See Report By 
              <span class="text-uppercase btn btn-sm btn-pill badge badge-pill badge-white text-muted font-weight-bolder">
              <span class="text-dark"><span class="text-info"> User Name</span></strong>
              </span>
            </div>
            <div class="row mr-2">
                <div class="col-sm-12">
                  @if($errors->has('user_id'))
                      <span class="text-danger text-small ml-5">
                          {{ $errors->first('user_id') }}
                      </span>
                  @endif
                  <form action="{{route('admin.individaulReport')}}" class="navbar-search-light">
                    <div class="form-group mt-4 ml-4 mb-4">
                      <div class="input-group input-group-alternative input-group-merge">
                             <select name="user_id" class="form-control text-primary ml-5" id="exampleFormControlSelect1">
                                <option value="" selected >Choose a Name</option>
                                @foreach($users as $key => $user)
                                    <option {{old('user_id') == $user->id ? 'selected' : null}} value="{{$user->id}}">{{$user->first_name}} {{$user->sur_name}}</option>
                                @endforeach
                            </select>
                        <span>
                      </span>
                      </div>
                       <button type="submit" class="btn btn-lg rounded btn-danger badge-danger border-white btn-block mt-3 mb-3">
                            SEE REPORT
                        </button>
                       {{-- @error('query')
                          <span class="text-danger text-small"><small>{{ $message }}</small></span>
                          @enderror --}}
                  </form>
                </div> 
              </div>
          </div>  
        </div> 
        {{-- search for Ordained priest--}}
@endsection