@extends('dashboard.layouts.main')

@section('container')
    <h2>Objek <b> Pajak</b></h2>

    <div class="col-lg-4 d-flex flex-column">
      <div class="row flex-grow">
          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                      <div>
                                       <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-objek-pajak">Tambah Objek Pajak</button>
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
                  <h4 class="card-title">Register Objek Pajak</h4>
                  <p class="card-description">
                    Data Objek Pajak yang sudah diregistrasi
                  </p>
                  @if (session()->has('success'))
                    <div class="alert alert-success col-lg-12 " role="alert">{{ session('success') }}
                    </div>
                @endif
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Jenis Pajak</th>
                          <th>Objek Pajak</th>
                          <th>Alamat</th>
                          <th>Rekening</th>
                          <th>Cetak</th>
                          <th>Aksi</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                       
                        
                        
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
    <div class="modal fade " id="tambah-objek-pajak" tabindex="-1" aria-labelledby="tambah-objek-pajak" aria-hidden="true">
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
                              <a href="{{ route('objek_pajak.create',$wp->id) }}">
                                <button type="button" class="btn btn-success btn-icon-text">
                                <i class="ti-plus btn-icon-prepend"></i>Objek Pajak
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