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
                <h3 class="mb-0 text-white ml-2"><i class="fas fa-user-plus mr-2 text-info"></i>Create New User
                  </a>
                </h3>
              </div>
            </div>
            <a href="{{ route('admin.users.index')}}" class="badge badge-pill badge-danger float-right mt--4"><i class="fas fa-angle-double-left"></i></i> Go back</a>
          </div>
          <div class="card-body">
              {{-- Form -> community --}}
            <form method="POST" action="{{route('admin.users.store')}}">
              @include('admin.users.includes.form', ['create' => true])
              {{-- @include('admin.users.includes.form') --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    

@endsection

