@extends('admin.admin_master')
@section('admin')
{{-- table row --}}
<div class="row mt--5">
  <div class="col-xl-12 p-4">
    <div class="card">
      <div class="card-header border-0 bg-default">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0 float-right text-white">Community List </h3>
          </div>
          <a href="{{route('admin.community.create')}}" class="badge badge-pill badge-warning badge-circle badge-lg display-inline-block  "><i class="fas fa-plus-circle"></i></a>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">Total : <span class="badge badge-md badge-circle badge-floating badge-secondary border-white">{{count( $communities)}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
        <!-- Projects table -->
        @if(count($communities) > 0)
        <table class="table align-items-center text-dark table-hover">
          <thead class="thead-light">
            <tr>
              <th class="text-warning font-weight-bolder" scope="col">No.</th>
              <th class="text-warning" scope="col">Community Name</th>
              <th class="text-warning" scope="col">Community Contact No</th>
              <th class="text-warning" scope="col">Rector/Superior Contact No.</th>
              <th class="text-warning" scope="col">Pincode</th>
              <th class="text-warning" scope="col">Village / Town </th>
              <th class="text-warning" scope="col">Block / Sub-Division </th>
              <th class="text-warning" scope="col">District</th>
              <th class="text-warning" scope="col">State/Province/Region</th>
              <th class="text-warning" scope="col">Country</th>
              <th class="text-warning" scope="col">Address</th>
              <th class="text-warning" scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
                @foreach ($communities as $community)
                    <tr>
                        <td>{{$communities->firstItem()+$loop->index}}</td>
                        <td>{{$community->community_name}}</td>
                        <td>{{$community->mobile_number_community}}</td>
                        <td>{{$community->mobile_number_authority}}</td>
                        <td>{{$community->pincode}}</td>
                        <td>{{$community->village_town_colony}}</td>
                        <td>{{$community->block_subDivision}}</td>
                        <td>{{$community->district->district_name}}</td>
                        <td>{{$community->state->state_name}}</td>
                        <td>{{$community->country->country_name}}</td>
                        <td>{{$community->addressline}}</td>
                        <td><a href="{{ route('admin.community.edit', $community->id) }}" class="btn btn-warning btn-sm">edit</i></a>
                          <a href="{{ route('admin.community.destroy', $community->id) }}" class="btn btn-danger btn-sm"
                            onclick="event.preventDefault();
                            if(confirm('Sure, you want to delete it ?'))
                            {
                            document.getElementById('delete-community-form-{{$community->id}}').submit()
                            }">delete</a>
                          <form id="delete-community-form-{{$community->id}}" action="{{route('admin.community.destroy', $community->id)}}" method="POST" style="display: none">
                          @csrf
                          @method('DELETE')
                          </form>                          
                        </td>
                    </tr>        
          </tbody>
                @endforeach  
                @else  
                <div class="header pb-6 d-flex align-items-center" >
                <!-- Mask -->
                <span class="mask bg-default opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                  <div class="row">
                    <div class="col-lg-12 col-md-10">
                      <h1 class="display-2 text-white">Community list if empty!</h1>
                      <p class="text-white mt-0 mb-5">Please register a community. <a href="{{route('admin.community.create')}}"><u class="text-yellow">Register here.</u></a></p>
                    </div>
                  </div>
                </div>
              </div>
             @endif 
        </table>
                
        {{$communities->links()}}
      </div>
    </div>
  </div>
</div>
    
@endsection

