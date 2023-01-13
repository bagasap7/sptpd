@extends('dashboard.layouts.main')

@section('container')
    <h2>Registrasi <b>User</b></h2>

    <div class="col-lg-4 d-flex flex-column">
      <div class="row flex-grow">
          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                      <div>
                                       <a href="{{ route('wajib_pajak.create') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-user">Tambah User</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
    </div>

    <div class="home-tab">
      <div class="tab-content tab-content-basic">
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Akun</h4>
                  <p class="card-description">
                    Data Akun Wajib Pajak yang sudah diregistrasi
                  </p>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-12 " role="alert">{{ session('success') }}
                    </div>
                @endif
                @if (session()->has('delete'))
                    <div class="alert alert-danger col-lg-12 " role="alert">{{ session('delete') }}
                    </div>
                @endif
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Role User</th>
                          <th>Tanggal Dibuat</th>
                          <th>Aksi</th>
                     
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                         <td>{{ $loop->iteration }}</td> 
                         <td>{{ $user->username }}</td>
                         <td>{{ $user->name }}</td>
                         <td>{{ $user->email}}</td>
                         <td>{{ $user->akses == '2' ? 'Pengguna' : " " ; }}</td>
                         <td>{{ $user->tanggal_daftar }}</td>
                          <td>
                            <a type="button" class=" text-center  text-decoration-none btn btn-inverse-info btn-icon">Data</a>
                            <a type="button" href="" class="  btn btn-inverse-warning btn-icon"><i class="mdi mdi-pencil-box"></i></a>
                            <a type="button"  href="" class="  btn btn-inverse-danger btn-icon"> <i class="mdi mdi-delete"></i></a>
                          </td>
                        </tr>
                         @endforeach 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
                      
            </div>        
          </div>
        </div>
      </div>
    </div>

     <!-- Modal -->
    <div class="modal fade " id="tambah-user" tabindex="-1" aria-labelledby="tambah-user" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Wajib Pajak Terdaftar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal Daftar</th>
                          <th>NIK/NIB</th>
                          <th>NPWPD</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Nomer Telepon</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($wajibpajak as $wp)
                       <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $wp->tanggal_daftar }}</td>
                            <td>{{ $wp->nik }}</td>
                            <td> {{ "P.".$wp->jenis_usaha.".".sprintf("%07s",$wp->no_pendaftaran).".".$wp->id_kecamatan.".".$wp->id_kelurahan }}</td>
                            <td>{{ $wp->nama }}</td>
                            <td>{{ $wp->alamat }}</td>
                            <td>{{ $wp->no_telpon }}</td>
                            <td>
                              <a href="{{ route('tambah_user.create',$wp->id) }}">
                                <button type="button" class="btn btn-success btn-icon-text">
                                <i class="ti-plus btn-icon-prepend"></i>Buat Akun
                              </button>
                              </a>
                            </td> 
                       </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
          </div>
          
        </div>
      </div>
    </div>
@endsection