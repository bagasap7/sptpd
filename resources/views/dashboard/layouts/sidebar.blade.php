
<!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ '/dashboard' }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Pendaftaran</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#pendaftaran" aria-expanded="false" aria-controls="pendaftaran">
              <i class="menu-icon  mdi mdi-account-card-details"></i>
              <span class="menu-title">Pendaftaran</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="pendaftaran">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('wajib_pajak.index') }}">Wajib Pajak</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Objek Pajak</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Pelayanan</li>
          <li class="nav-item">
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-file-document-box"></i>
              <span class="menu-title">Pelaporan</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Pajak Hotel</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Pajak Restoran</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Pajak Parkir</a></li>
              </ul>
            </div>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-alert-octagon menu-icon"></i> 
              <span class="menu-title">Tunggakan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-square-inc-cash menu-icon"></i>
              <span class="menu-title">Pembayaran</span>
            </a>
          </li>
          
          </li>
          
          <li class="nav-item nav-category">Pendaftaran Akun</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-multiple-plus"></i>
              <span class="menu-title">User</span>
            
            </a>
            
          </li>
          <li class="nav-item nav-category">Keluar</li>
          <li class="nav-item">
            <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
              <i class="menu-icon mdi mdi-logout"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>