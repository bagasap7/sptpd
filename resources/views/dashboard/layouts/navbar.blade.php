<!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo d-flex" href="index.html">
            <img  class="d-flex mx-2" src="{{ asset('img\Kabupaten Rembang.png') }}" alt="logo" />
              <h4 class="d-flex mx-2 align-items-center"><b>E-SPTPD</b></h4>
          </a>
        
          {{-- <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="public\img\Kabupaten Rembang.png" alt="logo" />
          </a> --}}
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold">{{ auth()->user()->name }}</span></h1>
           
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-none d-lg-block">
            {{-- <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text" class="form-control">
            </div> --}}
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              @if (Auth::user()->akses == 1)
                    <img class="img-xs rounded-circle" src="{{ asset('img/admin.png') }}" alt="Profile admin"> </a>
              @else
              @if (Auth::user()->akses == 2)
                    <img class="img-xs rounded-circle" src="{{ asset('img/wp.png') }}" alt="Profile wp"> </a>
              @else
              @if (Auth::user()->akses == 3)
                  <img class="img-xs rounded-circle" src="{{ asset('img/bank.png') }}" alt="Profile bank"> </a>
              @endif
              @endif
              @endif
         
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                @if (Auth::user()->akses == 1)
                    <img class="img-xs rounded-circle" src="{{ asset('img/admin.png') }}" alt="Profile admin"> </a>
              @else
              @if (Auth::user()->akses == 2)
                    <img class="img-xs rounded-circle" src="{{ asset('img/wp.png') }}" alt="Profile wp"> </a>
              @else
              @if (Auth::user()->akses == 3)
                  <img class="img-xs rounded-circle" src="{{ asset('img/bank.png') }}" alt="Profile bank"> </a>
              @endif
              @endif
              @endif
                <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->name }}</p>
                <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </a>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-key-outline text-primary me-2"></i> Password </a>
                <form action="/logout" method="post">
                  @csrf
                    <button type="submit" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Logout</button>
                </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>