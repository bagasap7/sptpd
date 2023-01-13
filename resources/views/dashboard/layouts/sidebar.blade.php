<?php 
use App\Models\ObjekPajak;
?>
<!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ '/dashboard' }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @can('admin')
              
          
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
                <li class="nav-item"> <a class="nav-link" href="{{ route('objek_pajak.index') }}">Objek Pajak</a></li>
                
              </ul>
            </div>
          </li>
          @endcan

          <li class="nav-item nav-category">Pelayanan</li>
          
    @if (Auth::user()->id_wajib_pajak)
            @php
              $jenispajak = ObjekPajak::select('id_jenis_pajak')->where('id_wajib_pajak',Auth::user()->id_wajib_pajak)->groupBy('id_jenis_pajak')->get()
            @endphp 
      <li class="nav-item">
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-file-document-box"></i>
              <span class="menu-title">Pelaporan</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                  @if ($jenispajak->contains('id_jenis_pajak',1))
                      
                  <li class="nav-item"> <a class="nav-link" href="{{ route('pajak_hotel.index') }}">Pajak Hotel</a></li>
                  @endif
                  @if ($jenispajak->contains('id_jenis_pajak',2))
                  <li class="nav-item"> <a class="nav-link" href="{{ route('pajak_resto.index') }}">Pajak Restoran</a></li>
                  @endif
                  @if ($jenispajak->contains('id_jenis_pajak',3))
                  <li class="nav-item"> <a class="nav-link" href="{{ route('pajak_hiburan.index') }}">Pajak Hiburan</a></li>
                    @endif
                  @if ($jenispajak->contains('id_jenis_pajak',4))
                      <li class="nav-item"> <a class="nav-link" href="{{ route('pajak_parkir.index') }}">Pajak Parkir</a></li>
                  @endif  
                
              </ul>
            </div>
          </li>
      </li>
          @else
          @if (Auth::user()->akses == 1)
          <li class="nav-item">
            <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-file-document-box"></i>
              <span class="menu-title">Pelaporan</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('pajak_hotel.index') }}">Pajak Hotel</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('pajak_hiburan.index') }}">Pajak Hiburan</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('pajak_resto.index') }}">Pajak Restoran</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('pajak_parkir.index') }}">Pajak Parkir</a></li>
              </ul>
            </div>
            </li>
          </li>
                @else
          @if (Auth::user()->akses == 3)
              
          @endif
          
              
          @endif
@endif
          
              
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tunggakan.index') }}">
              <i class="mdi mdi-alert-octagon menu-icon"></i> 
              <span class="menu-title">Tunggakan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pembayaran.index') }}">
              <i class="mdi mdi-square-inc-cash menu-icon"></i>
              <span class="menu-title">Pembayaran</span>
            </a>
          </li>
          
          
          </li>

          @can('admin')
              
          <li class="nav-item nav-category">Pendaftaran Akun</li>
          <li class="nav-item">
            
            <a class="nav-link"  href="{{ route('tambah_user.index') }}" >
              <i class="menu-icon mdi mdi-account-multiple-plus"></i>
              <span class="menu-title">User</span>
            </a>
            
          </li>
          @endcan
          <li class="nav-item nav-category">Keluar</li>
          <li class="nav-item">
            <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
              <i class="menu-icon mdi mdi-logout"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>