@extends('dashboard.layouts.main')

@section('container')
    <h2>Wajib <b> Pajak</b></h2>
       <div class="col-md-12 grid-margin stretch-card " id="wp">
              <div class="card">
                <div class="card-body" style="max-width: 50%">
                  <h4 class="card-title">Data Wajib Pajak</h4>
                  <p class="card-description">
                    Detail Data Wajib Pajak 
                  </p>
                  {{-- <form class="forms-sample" action="/wajib_pajak/store" method="post">
                    @csrf
                    <div class=" row">
                      <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Daftar</label>
                      <div class="col-sm-4 date datepicker" id="datepicker-popup">
                       <input  id="tanggal_daftar" type="input" class="form-control" value="{{ $wp->created_at }}" required data-language="en" readonly >
                       
                      </div>
                    </div>
                    <div class="row">
                      <label for="nomor" class="col-sm-3 col-form-label">NPWD</label>
                      <div class="col-sm-4">
                        <input type="input" class="form-control" id="npwpd" name="npwpd"  value="{{ $wp->no_pendaftaran }}" readonly placeholder="Nomor" required>
                      </div>
                    </div>

                    <div class="row">
                      <label for="nik" class="col-sm-3 col-form-label">NIK/NIB</label>
                      <div class="col-sm-4">
                        <input type="text" name="nik" id="nik" value="{{ $wp->nik }}"  class="form-control "  placeholder="NIK" required>
                      </div>
                    </div>

                    <div class="row">
                      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-4">
                        <input type="disabled" name="nama" id="nama" class="form-control " value="{{ $wp->nama }}" placeholder="Nama" required>
                      </div>
                    </div>

                    <div class="row">
                      <label for="jalan" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-4">
                        <input type="text" class=" name="alamat" disabled id="alamat"  value="{{ $wp->alamat }}" placeholder="Alamat" required>
                      </div>
                    </div>
                    
                    <div class="row">
                      <label for="no_telpon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                      <div class="col-sm-4">
                        <input type="disabled" class="form-control " name="no_telpon" id="no_telpon" value="{{ $wp->no_telpon }}"  maxlength="13" placeholder="Nomor Telepon">
                      </div>
                    </div>
                    <div class="row">
                      <label for="kode_pos" class="col-sm-3 col-form-label">kode Pos</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control " name="kode_pos" id="kode_pos"   value="{{ $wp->kode_pos }}" maxlength="13" placeholder="Nomor Telepon">
                      </div>
                    </div>
                    <div class="row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-4">
                        <input type="email" class="form-control " name="email"   value="{{ $wp->email}}"id="email" placeholder="Email">
                      </div>
                    </div>
                  </form> --}}
                  <table class="table table-borderless ">
                     <tr>
                        <th>Tanggal Pendaftaran</th>
                        <td>: </td>
                        <td>{{ $wp->tanggal_daftar }}</td>
                    </tr>
                    <tr>
                        <th>NPWPD</th>
                        <td>: </td>
                        <td>{{ $wp->no_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <th>NIK/NIB</th>
                        <td>: </td>
                        <td>{{ $wp->nik }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>: </td>
                        <td>{{ $wp->nama }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: </td>
                        <td>{{ $wp->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Kode Pos</th>
                        <td>: </td>
                        <td>{{ $wp->kode_pos }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>: </td>
                        <td>{{ $wp->no_telpon }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: </td>
                        <td>{{ $wp->email }}</td>
                    </tr>    
                  </table>
                </div>
              </div>
            </div>

            
            <div class="col-md-12 grid-margin stretch-card " id="wp">
              <div class="card">
                <div class="card-body" >
                  <h4 class="card-title">Data Objek Pajak</h4>
                  <p class="card-description">
                    Detail Data Objek Pajak 
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                     <thead class="table-light">
                      <tr>
                        <th >No</th>
                        <th >Jenis Pajak</th>
                        <th >NOPD</th>
                        <th >Nama</th>
                        <th >Alamat</th>
                        <th >Kode Pos</th>
                        <th >Koordinat</th>
                        <th >Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      @foreach ($objekpajak as $op)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $op->jenispajak->nama_pajak }}</td>
                        <td>{{ sprintf("%02s",$op->jenispajak->kode_jenis_pajak ).".".sprintf("%07s",$op->no_objek).".".$op->kecamatan->kode_kecamatan.".".$op->kelurahan->kode_kelurahan}}</td>
                        <td>{{ $op->nama_objek }}</td>
                        <td>{{ $op->alamat_objek }}</td>
                        <td>{{ $op->kode_pos_objek}}</td>
                        <td>{{ $op->longitude.','.$op->latitude }}</td>
                        <td>
                          <a type="button" class=" text-center text-white text-decoration-none btn btn-dark btn-icon">Aksi</a>
                        </td>
                      </tr>
                      @endforeach
                      
                      
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            
            
            

            
@endsection