                {{-- CSRF Token --}}
            @csrf
            <h6 class="heading-small text-muted mb-4">Create new user using this form </h6>
            <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                      {{-- first name field --}}
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">First Name</label>
                            <input type="text" name="first_name" id="input-first_name" class="form-control text-primary @error('first_name') is-invalid @enderror"  
                            value="{{old('first_name')}} @isset($user){{$user->first_name}}@endisset">
                            @error('first_name')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                  </div>
                        {{-- middle name field --}}
                         <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Middle Name</label>
                            <input type="text" name="middle_name" id="input-middle_name" class="form-control text-primary @error('middle_name') is-invalid @enderror"
                            value="{{old('middle_name')}} @isset($user){{$user->middle_name}}@endisset">
                            @error('middle_name')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                         </div>
                        {{-- sur name filed --}}
                         <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="sur_name">Sur Name</label>
                            <input type="text" name="sur_name" id="sur_name" class="form-control text-primary @error('sur_name') is-invalid @enderror" 
                            value="{{old('sur_name')}} @isset($user){{$user->sur_name}}@endisset">
                            @error('sur_name')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        {{-- user email --}}
                         <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Email</label>
                            <input type="text" name="email" id="input-username" class="form-control text-primary @error('email') is-invalid @enderror" 
                            value="{{old('email')}}  @isset($user){{$user->email}}@endisset">
                            @error('email')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        {{-- user Password field --}}
                    @isset($create)
                         <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Password</label>
                            <input type="password" name="password" id="input-username" class="form-control text-primary @error('password') is-invalid @enderror" >
                            @error('password')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                         </div>
                         {{-- user Password Confirmation field --}}
                         <div class="col-lg-6">
                         
                        <div class="form-group">
                            <label class="form-control-label" for="password_confirmation">Password Confirm</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control text-primary @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                         </div>
                    @endisset
                         {{-- date of birth --}}
                         <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="birth_date">Date Of Birth</label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control datepicker" 
                            value="{{old('birth_date')}}  @isset($user){{$user->birth_date}}@endisset">
                            @error('birth_date')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                            </div>
                         </div>
                        {{-- date of entry in society of Jesus --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="entry_date_sj">Entry date SJ</label>
                            <input type="date" name="entry_date_sj" id="input-entry_date_sj" class="form-control" 
                            value="{{old('entry_date_sj')}}  @isset($user){{$user->entry_date_sj}}@endisset">
                            @error('entry_date_sj')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                            </div>
                        </div> 
                        {{-- Mobile number 1 --}}
                         <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="mobile_number1">Mobile No.1</label>
                            <input type="text" name="mobile_number1" id="input-mobile_number1" class="form-control text-primary @error('mobile_number1') is-invalid @enderror"  
                            value="{{old('mobile_number1')}}  @isset($user){{$user->mobile_number1}} @endisset" selected>
                            @error('mobile_number1')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="mobile_number2">Mobile No.2</label>
                            <input type="text" name="mobile_number2" id="input-mobile_number1" class="form-control text-primary @error('mobile_number2') is-invalid @enderror"
                            value="{{old('mobile_number2')}}  @isset($user){{$user->mobile_number2}}@endisset">
                            @error('mobile_number2')
                            <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- check Boxes --}}
                         <div class="col-lg-6">
                         <div class="mb-3">
                            <label class="form-control-label text-primary" for="assign_roles"><i class="fas fa-user-tag mr-2 text-primary"></i><u>Assign Roles</u></label>
                            @foreach($roles as $role)
                            <div class="form-check">
                               
                                <input class="form-check-input" name="roles[]"
                                        type="checkbox" value="{{$role->id}}" id="{{$role->role_name}}"
                                         {{-- plucking the role for user if user is alrady set ||returning checked roles for the user on edit page--}}
                                        @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray() )) checked @endif @endisset>
                                <label for="{{$role->role_name}}" class="form-check-label">
                                    {{$role->role_name}}
                                </label>        
                            </div>
                                
                            @endforeach
                        </div>
                        {{-- submit button and cancle button --}}
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        <a href="{{route('admin.users.index')}}" class="btn btn-sm btn-info">Cancle</a>    
                         </div>
                </div>
            </div>
        