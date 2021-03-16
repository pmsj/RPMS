@extends('admin.admin_master')
@section('admin')
{{-- table row --}}
<div class="row mt--5">
  <div class="col-xl-12 p-4">
    <div class="card">
      <div class="card-header border-0 bg-default">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0 float-right text-white">Country List </h3>
          </div>
          <a href="{{route('admin.country.create')}}" class="badge badge-pill badge-warning badge-circle badge-lg display-inline-block"><i class="fas fa-plus-circle"></i></a>
          <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary">Total : <span class="badge badge-md badge-circle badge-floating badge-secondary border-white">{{count( $country)}}</span></a>
          </div>
        </div>
      </div>
      <div class="table-responsive ">
         @if(count($country) > 0)
        <!-- Projects table -->
        <table class="table align-items-center table-hover ">
          <thead class="thead-light font-weight-bolder">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Country Name</th>
              <th scope="col">Abbreviation</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 1 @endphp
                @foreach ($country as $row)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$row->country_name}}</td>
                        <td>{{$row->country_abbreviation}}</td>
                        <td><a href="{{ route('admin.country.edit', $row->id) }}" class="btn btn-warning btn-sm">edit</i></a>
                            <a href="{{ route('admin.country.destroy', $row->id) }}" class="btn btn-danger btn-sm"
                              onclick="event.preventDefault();
                              if(confirm('Sure, you want to delete it ?'))
                              {
                              document.getElementById('delete-country-form-{{$row->id}}').submit()
                              }">delete</a>
                            <form id="delete-country-form-{{$row->id}}" action="{{route('admin.country.destroy', $row->id)}}" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                            </form>        
                        </td>
                    </tr>
                @endforeach            
          </tbody>
                @else  
                <div class="header pb-6 d-flex align-items-center" >
                <!-- Mask -->
                <span class="mask bg-default opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                  <div class="row">
                    <div class="col-lg-12 col-md-10">
                      <h1 class="display-2 text-white">Country list if empty!</h1>
                      <p class="text-white mt-0 mb-5">Please register a country.</p>
                    </div>
                  </div>
                </div>
              </div>
             @endif 
        </table>
      </div>
    </div>
  </div>
</div>
    
@endsection

