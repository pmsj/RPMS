@extends('admin.admin_master')
@section('title', 'Add Events')
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
                <h3 class="mb-0 text-white ml-2"><i class="fas fa-user-plus mr-2 text-info"></i>Add Priest's Event Data
                  </a>
                </h3>
              </div>
            </div>
            <a href="{{ route('admin.eventTransaction.index')}}" class="badge badge-pill badge-danger float-right mt--4"><i class="fas fa-angle-double-left"></i></i> Go back</a>
          </div>
          <div class="card-body">
            {{-- Form --}}
            <form method="POST" action="{{route('admin.eventTransaction.store')}}">
            {{-- CSRF Token --}}
            @csrf
            <h6 class="heading-small text-muted mb-4">Fill  Priest's Event detail using this form </h6>
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
                        {{-- Event id field--}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="event_id">Event</label>
                            <select name="event_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                <option value="" selected>Choose an event</option>
                                @foreach($events as $key => $event)
                                    <option {{old('event_id') == $event->id ? 'selected' : null}} value="{{$event->id}}">{{$event->event_name}}</option>
                                @endforeach
                            </select>
                             @if($errors->has('event_id'))
                            <span class="text-danger text-small">
                                {{ $errors->first('event_id') }}
                            </span>
                            @endif
                        </div>
                    </div>
                      {{-- held  on --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="held_on">Held On</label>
                            <input type="date" name="held_on" id="input-username" class="form-control datepicker text-primary @error('held_on') is-invalid @enderror" 
                            value="{{old('held_on')}}">
                            @error('held_on')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        {{-- Presided over by filed --}}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="presided_over_by">Presided Over By</label>
                            <input type="text" name="presided_over_by" id="sur_name" class="form-control text-primary @error('presided_over_by') is-invalid @enderror" 
                           value="{{old('presided_over_by')}}">
                            @error('presided_over_by')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="community_id">Community</label>
                            <select name="community_id" class="form-control text-primary" id="exampleFormControlSelect1">
                                <option value="" selected>Choose Residing Community (if applicable)</option>
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
                    {{-- Place --}}
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="place">Place</label>
                            <input type="text" name="place" id="place" class="form-control text-primary @error('place') is-invalid @enderror" 
                           value="{{old('place')}}">
                            @error('place')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        {{-- submit button and cancle button --}}
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        <a href="{{route('admin.eventTransaction.index')}}" class="btn btn-sm btn-info">Cancel</a>    
                </div>
            </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

