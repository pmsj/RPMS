<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  align-items-center bg-gradient-red">
      <a class="navbar-brand font-weight-bolder" href="javascript:void(0)">
        {{-- <img src="assets/img/brand/blue.png" alt="..."> --}}
        <img src="{{asset('backend1/assets/img/brand/ran_nav_blue.PNG')}}" class="navbar-brand-img pr-2" /><span class="text-white">Ranchi Jesuits</span>
      </a>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse bg-white" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item text-center">
            <a href="#" class="badge badge-pill badge-warning">
              <i class="fas fa-user-tag"></i>
              <strong class="text-gradient-default" title="Roles">
                {{implode(', ', Auth::user()->roles()->get()->pluck('role_name')->toArray())}}
              </strong>
              </a>
          </li>
           {{-- dashboard link --}}
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="ni ni-chart-pie-35 text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
           {{-- User profile link --}}
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.profile')}}">
              <i class="ni ni-single-02 text-info"></i>
              <span class="nav-link-text">My Profile</span>
            </a>
          </li>
          {{-- User Personal details --}}
          <li class="nav-item menu-items">
              <a class="nav-link" data-toggle="collapse" href="#auth3" aria-expanded="false" aria-controls="auth3">
                <span class="menu-icon">
                  <i class="mdi mdi-security"></i>
                </span>
                <i class="fas fa-users-cog text-warning"></i>
                <span class="menu-title">Personal Details</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth3">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('user.personalDetail.index')}}"><i class="far fa-eye text-warning"></i>View P. Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('user.personalDetail.create')}}"><i class="fas fa-user-plus text-warning"></i>Add P. Details</a></li>
                </ul>
              </div>
          </li>
          {{-- HR management --}}
    @can('is-admin')    
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#HrBasicEntries" aria-expanded="false" aria-controls="HrBasicEntries">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <i class="ni ni-archive-2 text-info"></i>
              {{-- basic details entries --}}
              <span class="menu-title"> Basic Entries</span>
              <i class="menu-arrow text-info"></i>
            </a>
            <div class="collapse" id="HrBasicEntries">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item table-hover"> <a class="nav-link" href="{{ route('admin.community.index')}}"><i class="fas fa-warehouse"></i>Community</a></li>
                <li class="nav-item table-hover"> <a class="nav-link" href="{{ route('admin.country.index')}}"><i class="fas fa-globe-africa"></i>Country</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.designation.index')}}"><i class="fas fa-user-tie"></i>Designation</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.district.index')}}"><i class="fas fa-map-marker-alt"></i>District</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.event.index')}}"><i class="fas fa-map-marker-alt"></i>Events</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.formationStage.index')}}"><i class="fas fa-map-signs"></i>Formation Stage</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.institution.index')}}"><i class="fas fa-university"></i>Institution</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.ministry.index')}}"><i class="fas fa-vihara"></i>Ministry</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.parish.index')}}"><i class="fas fa-church"></i>Parish</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.province.index')}}"><i class="fas fa-map-marker-alt"></i>Province</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.state.index')}}"><i class="fas fa-map-marker-alt"></i>State</a></li>
              </ul>
            </div>
          </li>
         @endcan
          {{-- user management --}}
          @can('is-admin')
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <i class="fas fa-users-cog text-warning"></i>
              <span class="menu-title">User Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.users.index')}}"><i class="far fa-eye text-warning"></i>View All users</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.users.create')}}"><i class="fas fa-user-plus text-warning"></i>Create New User </a></li>
              </ul>
            </div>
          </li>
          @endcan 
          {{-- user Role Management --}}
          @can('is-admin')
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth2">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <i class="far fa-user-circle text-primary"></i>
              <span class="menu-title">Role Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.roles.index')}}"><i class="far fa-eye text-primary"></i>View All Roles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('admin.roles.create')}}"><i class="fas fa-user-tag text-primary"></i></i>Create New Role </a></li>
              </ul>
            </div>
          </li>
          {{-- Formation Stage Data --}}
           <li class="nav-item menu-items">
              <a class="nav-link" data-toggle="collapse" href="#auth4" aria-expanded="false" aria-controls="auth4">
                <span class="menu-icon">
                  <i class="mdi mdi-security"></i>
                </span>
                <i class="fas fa-school text-success"></i>
                <span class="menu-title">Formation Details</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth4">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.formationTransaction.index')}}"><i class="far fa-eye text-warning"></i>View F.Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('admin.formationTransaction.create')}}"><i class="fas fa-user-plus text-warning"></i>Add A.Details</a></li>
                </ul>
              </div>
          </li>
          {{-- events of a priest --}}
          <li class="nav-item menu-items">
              <a class="nav-link" data-toggle="collapse" href="#auth5" aria-expanded="false" aria-controls="auth5">
                <span class="menu-icon">
                  <i class="mdi mdi-security"></i>
                </span>
                <i class="fas fa-pray text-primary font-weight-bolder"></i>
                <span class="menu-title">Priest Event Details</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth5">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.eventTransaction.index')}}"><i class="far fa-eye text-warning"></i>View E.Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('admin.eventTransaction.create')}}"><i class="fas fa-user-plus text-warning"></i>Add E.Details</a></li>
                </ul>
              </div>
          </li>
          {{-- appointments link --}}
          <li class="nav-item menu-items">
              <a class="nav-link" data-toggle="collapse" href="#auth6" aria-expanded="false" aria-controls="auth6">
                <span class="menu-icon">
                  <i class="mdi mdi-security"></i>
                </span>
                <i class="fas fa-calendar-check text-red"></i>
                <span class="menu-title">Appointments</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth6">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{route('admin.appointment.index')}}"><i class="far fa-eye text-warning"></i>View Appointments</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{route('admin.appointment.create')}}"><i class="fas fa-user-plus text-warning"></i>Make Appointment</a></li>
                </ul>
              </div>
          </li>
          {{-- Report --}}
          <li class="nav-item menu-items">
              <a class="nav-link" data-toggle="collapse" href="#auth7" aria-expanded="false" aria-controls="auth7">
                <span class="menu-icon">
                  <i class="mdi mdi-security"></i>
                </span>
                <i class="fas fa-book text-dark"></i>
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth7">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link text-dark" href="{{route('admin.search')}}"> - Search Users</a></li>
                  <li class="nav-item"> <a class="nav-link text-dark" href="{{route('admin.generateIndividaulReport')}}"> - Individual Report</a></li>
                  <li class="nav-item"><a class="nav-link text-dark" href="{{route('admin.user.departed')}}"> - All Departures</a></li>
                  <li class="nav-item"><a class="nav-link text-dark" href="{{route('admin.currentYearAdmissions')}}"></i> - Current Year Admission</a></li>
                  <li class="nav-item"><a class="nav-link text-dark" href="{{route('admin.currentYearDeacons')}}"></i> - Current Year Deacons</a></li>
                  <li class="nav-item"><a class="nav-link text-dark" href="{{route('admin.currentYearDepartedUsers')}}"></i> - Current Year Departures</a></li>
                </ul>
              </div>
          </li>
         @endcan
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          {{-- logout link --}}
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.logout')}}" onclick="return confirm('Wish to logout ?')">
              <i class="fas fa-power-off text-danger"></i>
              <span class="nav-link-text">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>