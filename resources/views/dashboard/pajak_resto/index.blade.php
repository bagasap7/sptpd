@extends('dashboard.layouts.main')

@section('container')
    <h2>Pajak <b>  Restoran</b></h2>

    <div class="col-lg-4 d-flex flex-column">
      <div class="row flex-grow">
          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                      <div>
                                       <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-pajak-resto">Tambah Pajak Restoran</button>
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
                  <h4 class="card-title">Register Pajak Restoran</h4>
                  <p class="card-description">
                    Data Pajak Restoran yang sudah diregistrasi
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
                          <th>Wajib Pajak</th>
                          <th>Jenis Pajak</th>
                          <th>Objek Pajak</th>
                          <th>Alamat</th>
                          <th>Masa Pajak</th>
                          <th>Pokok Pajak (Rp)</th>
                          <th>Kode Bayar</th>
                          <th>SPTPD</th>

                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($transaksi as $tr)
                        <tr>
                         <td>{{$loop->iteration}}</td>
                         <td>{{$tr->wajibpajak->nama}}</td>
                         <td>{{$tr->jenispajak->nama_pajak}}</td>
                         <td>{{$tr->objekpajak->nama_objek}}</td>
                         <td>{{$tr->objekpajak->alamat_objek}}</td>
                         <td>{{$tr->masa_awal.' '. '-' . ' '.$tr->masa_akhir}}</td>
                         <td>{{$tr->total_pajak}}</td>
                            <td>{{$tr->kode_bayar}}</td>
                          <td>
                           <a href="">
                              <button type="button" class="btn btn-inverse-primary btn-lg mdi mdi-file"></button>
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
        </div>
      </div>
    </div>

     <!-- Modal -->
    <div class="modal fade " id="tambah-pajak-resto" tabindex="-1" aria-labelledby="tambah-objek-pajak" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Data Pajak Resto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NPWPD</th>
                          <th>Wajib Pajak</th>
                          <th>Objek Pajak</th>
                          <th>Alamat</th>
                          <th>Nomer Telepon</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($objekpajak as $op)
                       <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ "P.".$op->wajibpajak->jenis_usaha.".".sprintf("%07s",$op->wajibpajak->no_pendaftaran).".".$op->wajibpajak->id_kecamatan.".".$op->wajibpajak->id_kelurahan }}</td>
                            <td>{{ $op->wajibpajak->nama }}</td>
                            <td>{{ $op->nama_objek }}</td>

                            <td>{{ $op->alamat_objek }}</td>
                            <td>{{ $op->wajibpajak->no_telpon }}</td>
                            <td>
                              <a href="{{ route('pajak_resto.create',$op->id) }}">
                                <button type="button" class="btn btn-success btn-icon-text">
                                <i class="ti-plus btn-icon-prepend"></i>Input Pajak Restoran
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
