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
                <h3 class="mb-0 text-white ml-2"><i class="fas fa-user-plus mr-2 text-info"></i>Make New Appointments
                  </a>
                </h3>
              </div>
            </div>
            <a href="{{ route('admin.appointment.index')}}" class="badge badge-pill badge-danger float-right mt--4"><i class="fas fa-angle-double-left"></i></i> Go back</a>
          </div>
          <div class="card-body">
            {{-- Form --}}
            <form method="POST" action="{{route('admin.appointment.store')}}">
            {{-- CSRF Token --}}
            @csrf
            <h6 class="heading-small text-muted mb-4">Fill  Appointment detail using this form </h6>
            <div class="pl-lg-4">
                <div class="row">
                      {{-- first name field --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="user_id">User Name</label>
                            <select name="user_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                <option value="" selected>Choose a Name</option>
                                @foreach($users as $key => $user)
                                    <option {{old('user_id') == $user->id ? 'selected' : null}} value="{{$user->id}}">{{$user->first_name}} {{$user->sur_name}}</option>
                                @endforeach
                            </select>
                             @if($errors->has('user_id'))
                            <span class="text-danger text-small">
                                {{ $errors->first('user_id') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    {{-- ministry filed --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="ministry">Type of Ministry</label>
                            <input type="text" name="ministry" id="ministry" class="form-control text-primary @error('ministry') is-invalid @enderror" 
                           value="{{old('ministry')}}">
                            @error('ministry')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        {{-- Designation id field--}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="designation_id">Designation / Post</label>
                            <select name="designation_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                <option value="" selected>Choose a Designation or Post</option>
                                @foreach($designations as $key => $designation)
                                    <option {{old('designation_id') == $designation->id ? 'selected' : null}} value="{{$designation->id}}">{{$designation->designation_name}}</option>
                                @endforeach
                            </select>
                             @if($errors->has('designation_id'))
                            <span class="text-danger text-small">
                                {{ $errors->first('designation_id') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    {{-- institution_parish_office filed --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="institution_parish_office">Institution/Parish/Office</label>
                            <input type="text" name="institution_parish_office" id="institution_parish_office" class="form-control text-primary @error('institution_parish_office') is-invalid @enderror" 
                           value="{{old('institution_parish_office')}}">
                            @error('institution_parish_office')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                      {{--  Start date --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="start_date">Start date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control datepicker text-primary @error('start_date') is-invalid @enderror" 
                            value="{{old('start_date')}}">
                            @error('start_date')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                     {{--  End date --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="end_date">End date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control datepicker text-primary @error('end_date') is-invalid @enderror" 
                            value="{{old('end_date')}}">
                            @error('end_date')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Any Comment</label>
                            <textarea rows="4" class="form-control text-primary" name="comment" value="{{old('comment')}}" placeholder="comments if any...."></textarea>
                            @error('comment')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label" for="community_id">Community</label>
                            <select name="community_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                <option value="" selected>Choose Residing Community</option>
                                @foreach($communities as $key => $community)
                                    <option value="{{$community->id}}" {{old('community_id') == $community->id ? 'selected' : null}}>{{$community->community_name}}</option>
                                @endforeach
                            </select>
                             @if($errors->has('community_id'))
                            <span class="text-danger text-small">
                                {{ $errors->first('community_id') }}
                            </span>
                            @endif
                        </div>
                    </div>
                        {{-- submit button and cancle button --}}
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        <a href="{{route('admin.appointment.index')}}" class="btn btn-sm btn-info">Cancel</a>    
                </div>
            </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

