@extends('admin.admin_master')
@section('admin')

      <div class="col-xl-9">
          <div class="card">
            <div class="card-header border-0 bg-gradient-warning">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0 text-white">Personal Details
                    <a href="{{route('user.personalDetail.create')}}" 
                      class="badge badge-pill badge-warning badge-circle badge-md display-inline-block ml-2" 
                      data-toggle="tooltip" data-placement="top" title="Click to Add Personal Details">
                    <i class="fas fa-plus-circle"></i>
                  </a>
                  </h3>
                </div>
                <div class="col text-right">
                  @isset($personalDetails) <!--if personalDetails, meaning no related record exist, it will through error-->
                  <a href="{{route('user.personalDetail.edit', $personalDetails->id)}}" data-toggle="tooltip" data-placement="top" title="Click to Edit Personal Details" <i class="fas fa-edit mr-2 text-default h3"></i></a>
                  <a href="{{ route('user.personalDetail.destroy', $personalDetails->id)}} " data-toggle="tooltip" data-placement="top" title="Delete Personal Details"
                             onclick="event.preventDefault();
                            if(confirm('Are you sure to delete it ?'))
                            {
                            document.getElementById('delete-personalDetail-from-{{$personalDetails->id}}').submit()
                            } 
                            "><i class="fas fa-trash-alt text-danger h3"></i></i>
                          </a>
                          <form id="delete-personalDetail-from-{{$personalDetails->id}}" action="{{route('user.personalDetail.destroy', $personalDetails->id)}}" method="POST" style="display:none">
                            @csrf
                            @method("DELETE")
                            </form>
                  @endisset
                </div>
              </div>
            </div>
              <div class="align-items-center bg-gradient-warning">
                <hr class="p-0 m-0 bg-secondary">
                  <h3 class="text-white text-center"><i class="fas fa-user-circle mr-2 text-default"></i>{{Auth::user()->first_name}} - {{Auth::user()->sur_name}}</h3>
              </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center  table-bordered ">
                <tbody class="text-primary">
                  {{-- //using count was giving error - because count is implemented for countable elements --}}
                @if(!is_null($personalDetails)) 
                        @if(Auth::user()->id == $personalDetails->user_id)
                        <tr>
                            <th>Father's Name </th>
                            <td class="text-default">{{$personalDetails->father}}</td>
                        </tr>
                        <tr>
                            <th>Mother's Name </th>
                            <td class="text-default">{{$personalDetails->mother}}</td>
                        </tr>
                        <tr>
                            <th>Siblings </th>
                            <td class="text-default">{{$personalDetails->siblings}}</td>
                        </tr>
                        <tr>
                            <th>Village / Town / Colony </th>
                            <td class="text-default">{{$personalDetails->village_town_colony}}</td>
                        </tr>
                        <tr>
                            <th>Parish </th>
                            <td class="text-default">{{$personalDetails->parish}}</td>
                        </tr>
                        <tr>
                            <th>Dioses </th>
                            <td class="text-default">{{$personalDetails->dioses}}</td>
                        </tr>
                        <tr>
                            <th>District </th>
                            <td class="text-default">{{$personalDetails->district->district_name}}</td> <!--geting district name from district id using relationship between personaldetail and district-->
                        </tr>
                        <tr>
                            <th>Pincdoe </th>
                            <td class="text-default">{{$personalDetails->pincode}}</td>
                        </tr>
                        <tr>
                            <th>Post Office </th>
                            <td class="text-default">{{$personalDetails->post_office}}</td>
                        </tr>
                        <tr>
                            <th>Post Box No </th>
                            <td class="text-default">{{$personalDetails->post_box_number}}</td>
                        </tr>
                        <tr>
                            <th>State </th>
                            <td class="text-default">{{$personalDetails->state->state_name}}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td class="text-default">{{$personalDetails->country->country_name}}</td>
                        </tr>
                    </tbody>
                     @endif {{-- @if(Auth::user()->id == $personalDetails->user_id) --}}
                    @else
                    <div class="header pb-6 d-flex align-items-center" >
                    <!-- Mask -->
                    <span class="mask bg-default opacity-8"></span>
                    <!-- Header container -->
                    <div class="container-fluid d-flex align-items-center">
                      <div class="row">
                        <div class="col-lg-12 col-md-10">
                          <h3 class="display-2 text-white">No Personal Details Found !</h3>
                          <p class="text-white mt-0 mb-5 ">Please fill in your personal details.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif {{--   @if(!is_null($personalDetails)) --}}
                  </table>
            </div>
          </div>
        </div>
    
@endsection

